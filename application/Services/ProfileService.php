<?php

namespace Auth7\Services;

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
                // check token
                var_dump('validation passed');
                exit;
            }
        }

        // if (password_verify('avatar', $data['edit'])) {
        //     echo 'avatar';
        //     exit;
        // }

        // if (password_verify('password', $data['edit'])) {
        //     echo 'password';
        //     exit;
        // }

        // if (password_verify('email', $data['edit'])) {
        //     echo 'email';
        //     exit;
        // }
    }
}
