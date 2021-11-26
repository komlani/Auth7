<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Auth7\Model\HumanModel;
use Rakit\Validation\Validator;
use Auth7\Services\EmailService;
use Auth7\Services\AvatarService;

class ProfileService
{
    public $email;
    public $model;
    public $avatarService;

    public function __construct()
    {
        $this->email = new EmailService();;
        $this->model = new HumanModel();
        $this->avatarService = new AvatarService();;
    }

    public function profileData($id = null)
    {
        return ($id
            ? $this->model->getHumanInfo($id)
            : $this->model->getHumanInfo($_SESSION['auth7_userId']));
    }

    public function manageRequest($data)
    {
        /** Edit view forms has hidden 
         * inputs with names 'edit'. These inputs
         *  values are hashed using password_hash(). 
         * 
         * So we verify their availabily
         * using password_verify() method*/
        if (password_verify('general_info', $data['edit'])) {

            $validation = (new Validator)->validate($data, [
                '_token' => 'required|alpha_num',
                'user_id' => 'required|numeric',
                'edit' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required|max:20',
            ]);

            if ($validation->fails()) {
                $_SESSION['validated'] = $validation->getValidatedData();
                $_SESSION['errors'] = $validation->errors->firstOfAll();

                Helper::redirect('profile/edit/' . $data['user_id']);
            } else {

                $this->_protectRequest();

                $this->model->updateGeneralInfo($data);

                $_SESSION['general_info_updated'] = true;

                Helper::redirect('profile/edit/' . $data['user_id']);
            }
        } elseif (password_verify('avatar', $data['edit'])) {

            /** superglobal $_FILES is
             * implicitly passed to namageRequest() */
            $validation = (new Validator)->validate($data + $_FILES, [
                '_token' => 'required|alpha_num',
                'user_id' => 'required|numeric',
                'edit' => 'required',
                'avatar' => 'required|uploaded_file:0,3M,png,jpeg',
            ]);

            if ($validation->fails()) {
                $_SESSION['validated'] = $validation->getValidatedData();
                $_SESSION['errors'] = $validation->errors->firstOfAll();

                Helper::redirect('profile/edit/' . $data['user_id']);
            } else {

                $this->_protectRequest();

                if (
                    $this->avatarService->update(

                        $this->avatarService->resize(

                            $this->avatarService->upload($data['user_id'])
                        )
                    )
                ) {
                    $_SESSION['avatar_updated'] = true;

                    Helper::redirect('profile/edit/' . $data['user_id']);
                } else {
                    var_dump('saving img error');
                    exit; //TODO: define saving img error
                }
            }
        } elseif (password_verify('password', $data['edit'])) {

            $validation = (new Validator)->validate($data, [
                '_token' => 'required|alpha_num',
                'user_id' => 'required|numeric',
                'edit' => 'required',
                'oldPassword' => 'required|min:8',
                'newPassword' => 'required|min:8|different:oldPassword',
                'new_password_confirm' => 'required|same:newPassword',
            ]);

            if ($validation->fails()) {
                $_SESSION['validated'] = $validation->getValidatedData();
                $_SESSION['errors'] = $validation->errors->firstOfAll();

                Helper::redirect('profile/edit/' . $data['user_id']);
            } else {

                $this->_protectRequest();

                try {

                    $this->model->auth->changePassword($_POST['oldPassword'], $_POST['newPassword']);
                    $this->email->sendPasswordResetEmail($this->model->auth->getEmail());

                    $_SESSION['password_updated'] = true;
                    
                    Helper::redirect('profile/edit/' . $data['user_id']);
                } catch (\Delight\Auth\NotLoggedInException $e) { //TODO: define pass reset error messages views
                    die('Not logged in');
                } catch (\Delight\Auth\InvalidPasswordException $e) {
                    die('Invalid password(s)');
                } catch (\Delight\Auth\TooManyRequestsException $e) {
                    die('Too many requests');
                }
            }
        } else {
            Helper::redirect('profile/edit/' . $data['user_id']);
        }
    }

    private function _protectRequest()
    {
        Helper::isMe($_POST['user_id']);
        Helper::checkToken();
    }
}
