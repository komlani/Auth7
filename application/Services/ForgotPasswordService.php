<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Rakit\Validation\Validator;
use Auth7\Model\ResetPasswordModel;

class ForgotPasswordService
{
    public $model;
    public $email;

    public function __construct()
    {
        $this->model = new ResetPasswordModel();
        $this->email = new EmailService();
    }

    public function manageRequest($data)
    {
        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'email' => 'required|email',
        ]);

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();

            Helper::redirect('ForgotPassword');
        } else {

            //TODO: verify token

            try {
                $this->model->auth->forgotPassword($_POST['email'], function ($selector, $token) {
                    $this->email->sendForgotPasswordEmail($selector, $token, $_POST['email']);
                });
            } catch (\Delight\Auth\InvalidEmailException $e) { //TODO: manage errors messages
                die('Invalid email address');
            } catch (\Delight\Auth\EmailNotVerifiedException $e) {
                die('Email not verified');
            } catch (\Delight\Auth\ResetDisabledException $e) {
                die('Password reset is disabled');
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }
}
