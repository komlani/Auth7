<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Rakit\Validation\Validator;

class LoginService
{
    public function manageRequest($data)
    {
        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'remember_me' => 'nullable|boolean',
        ]);

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();

            Helper::redirect('login');
        } else {
            echo 'success';
            exit;
        }
    }
}
