<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Rakit\Validation\Validator;

class VerifyEmailService
{
    public function manageRequest($data)
    {
        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'email' => 'required|email',
        ]);

        if ($validation->fails()) {
            $_SESSION['validation_error'] = true;

            Helper::redirect('verifyEmail');
        } else {
            echo 'success';
            exit;
        }
    }
}
