<?php

namespace Auth7\Services;

use Auth7\Core\Model;
use Auth7\Libs\Helper;
use Rakit\Validation\Validator;

class RegisterService
{
    public $model;
    public $email;

    public function __construct()
    {
        $this->model = new Model();
        $this->email = new EmailService();
    }

    public function manageRequest($data)
    {
        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
        ]);

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();

            Helper::redirect('register');
        } else {

            Helper::checkToken();

            try {
                $userId = $this->model->auth->register(
                    $_POST['email'],
                    $_POST['password'],
                    null,

                    function ($selector, $token) {
                        $this->email->sendVerificationEmail($selector, $token, $_POST['email']);
                    }
                    
                    //TODO: insert human other informations
                );

            } catch (\Delight\Auth\InvalidEmailException $e) { //TODO:magage register error messages
                die('Invalid email address');
            } catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Invalid password');
            } catch (\Delight\Auth\UserAlreadyExistsException $e) {
                die('User already exists');
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }

    public function verifyEmail($data)
    {
        try {
            $this->model->auth->confirmEmail($data['selector'], $data['token']);
          
            $_SESSION['email_verified'] = true;
           
            Helper::redirect('register');
        } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) { //TODO: manage email confirmation errors messages
            die('Invalid token');
        } catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}
