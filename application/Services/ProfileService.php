<?php

namespace Auth7\Services;

use Auth7\Core\Model;
use Auth7\Libs\Helper;
use Auth7\Model\HumanModel;
use Rakit\Validation\Validator;

class ProfileService
{
    public $model;

    public function __construct()
    {
        $this->model = new HumanModel();
    }

    public function profileData($id = null)
    {
        return ($id
            ? $this->model->getHumanInfo($id)
            : $this->model->getHumanInfo($_SESSION['auth7_userId']));
    }

    public function manageRequest($data)
    {
        //TODO: verify edit data availabilly

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
        }
    }
}
