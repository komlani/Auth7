<?php

namespace Auth7\Services;

use Auth7\Core\Model;
use Auth7\Libs\Helper;
use Auth7\Model\HumanModel;
use Rakit\Validation\Validator;
use Auth7\Services\AvatarService;
use Delight\FileUpload\FileUpload;
use Delight\FileUpload\Throwable\UploadCancelledException;

class ProfileService
{
    public $model;
    public $avatarService;

    public function __construct()
    {
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
        // TODO: helper verify if auth user is who whant te perform action
        //TODO: verify edit data availabilly

        if(!isset($data['edit']))
            Helper::redirect('error');

        /** Edit view forms have hidden 
         * inputs with names 'edit' with 
         * values hashed using password_hash(). 
         * 
         * So we verify their availabily
         * using password_verify() method*/
        if (password_verify('general_info', $data['edit'])) {

            $validation = (new Validator)->validate($data, [
                '_token' => 'required|alpha_num',
                'user_id' => 'required|numeric',
                'human_id' => 'required|numeric',
                'edit' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
            ]);

            if ($validation->fails()) {
                $_SESSION['validated'] = $validation->getValidatedData();
                $_SESSION['errors'] = $validation->errors->firstOfAll();

                Helper::redirect('profile/edit/' . $data['user_id']);
            } else {

                Helper::checkToken();

                var_dump('nada');
                exit;
            }
        } elseif (password_verify('avatar', $data['edit'])) {

            //TODO: check permission + isMe

            /** superglobal $_FILES is
             * implicitly passed to namageRequest() */
            $validation = (new Validator)->validate($data + $_FILES, [
                '_token' => 'required|alpha_num',
                'user_id' => 'required|numeric',
                'human_id' => 'required|numeric',
                'edit' => 'required',
                'avatar' => 'required|uploaded_file:0,3M,png,jpeg',
            ]);

            if ($validation->fails()) {
                $_SESSION['validated'] = $validation->getValidatedData();
                $_SESSION['errors'] = $validation->errors->firstOfAll();

                Helper::redirect('profile/edit/' . $data['user_id']);
            } else {

                Helper::checkToken();

                // service upload
            //    $t =  $this->avatarService->upload($data['user_id']);
            //    var_dump($t); exit;
            
                // serive resize
                // service save in db

                $upload = new FileUpload();
                $upload->withTargetDirectory(PUBLIC_PATH . $data['user_id'] . '/avatars');
                $upload->from('avatar');

                try {
                    $uploadedFile = $upload->save();
                } catch (UploadCancelledException $e) {
                    // upload cancelled
                }
            }
        } elseif (password_verify('password', $data['edit'])) {

            $validation = (new Validator)->validate($data, [
                '_token' => 'required|alpha_num',
                'user_id' => 'required|numeric',
                'human_id' => 'required|numeric',
                'edit' => 'required',
                'old_password' => 'required|min:8',
                'new_password' => 'required|min:8|different:old_password',
                'new_password_confirm' => 'required|same:new_password',
            ]);

            if ($validation->fails()) {
                $_SESSION['validated'] = $validation->getValidatedData();
                $_SESSION['errors'] = $validation->errors->firstOfAll();

                Helper::redirect('profile/edit/' . $data['user_id']);
            } else {

                Helper::checkToken();

                var_dump('password validation passed');
                exit;
            }
        } elseif (password_verify('email', $data['edit'])) {

            $validation = (new Validator)->validate($data, [
                '_token' => 'required|alpha_num',
                'user_id' => 'required|numeric',
                'human_id' => 'required|numeric',
                'edit' => 'required',
                'old_email' => 'required|email',
                'new_email' => 'required|email|different:old_email',
                'new_email_confirm' => 'required|email|same:new_email',
            ]);

            if ($validation->fails()) {
                $_SESSION['validated'] = $validation->getValidatedData();
                $_SESSION['errors'] = $validation->errors->firstOfAll();

                Helper::redirect('profile/edit/' . $data['user_id']);
            } else {

                Helper::checkToken();

                var_dump('email validation passed');
                exit;
            }
        }else{
            Helper::redirect('profile/edit/'. $data['user_id']);
        }
    }
}
