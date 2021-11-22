<?php

namespace Auth7\Services;

use Auth7\Core\Model;
use Auth7\Libs\Helper;
use Rakit\Validation\Validator;

class ResetPasswordService
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function manageRequest($data)
    {
        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'token' => 'required', // Delight PHP token
            'selector' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
        ]);

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();

            $_SESSION['token'] = $data['token'];
            $_SESSION['selector'] = $data['selector'];

            Helper::redirect('resetPassword');
        } else {
            try {
                $this->model->auth->resetPassword($data['selector'], $data['token'], $data['password']);
              
                $_SESSION['password_reseted'] = true;
              
                Helper::redirect('login');
            } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
                die('Invalid token');
            } catch (\Delight\Auth\TokenExpiredException $e) {
                die('Token expired');
            } catch (\Delight\Auth\ResetDisabledException $e) {
                die('Password reset is disabled');
            } catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Invalid password');
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }

    public function verifyAttempt($data)
    {
        try {
            $this->model->auth->canResetPasswordOrThrow($data['selector'], $data['token']);

            $_SESSION['selector'] = $data['selector'];
            $_SESSION['token'] = $data['token'];
            $_SESSION['email'] = $data['email'];

            Helper::redirect('resetPassword');
        } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) { //TODO: manage errors messages
            // $_SESSION['token_error'] = true;
            // Helper::redirect('forgotPassword');
            die('Invalid token');
        } catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        } catch (\Delight\Auth\ResetDisabledException $e) {
            die('Password reset is disabled');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}
