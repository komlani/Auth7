<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Rakit\Validation\Validator;

class ConfirmPasswordService
{
    public function manageRequest($data)
    {
        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();

            Helper::redirect('confirmPassword');
        } else {
            echo 'success';
            exit;
        }
    }
}
