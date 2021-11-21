<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Auth7\Model\RegisterModel;
use Rakit\Validation\Validator;

class LoginService
{
    public $model;

    public function __construct()
    {
        //TODO: check if user is already logged in
        $this->model = new RegisterModel();
    }

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

            //TODO: chack token

            try {

                if (isset($_POST['remember_me']))
                    $_POST['remember'] = $_POST['remember_me'];

                $rememberDuration = (isset($_POST['remember']) && $_POST['remember'] == 1)
                    ? (int) (60 * 60 * 24 * 365.25)
                    : null;

                $this->model->auth->login($_POST['email'], $_POST['password'], $rememberDuration);

                //TODO: set user session variables
                Helper::redirect('dashboard');
            } catch (\Delight\Auth\InvalidEmailException $e) { //TODO: manage login errors messages
                die('Wrong email address');
            } catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Wrong password');
            } catch (\Delight\Auth\EmailNotVerifiedException $e) {
                die('Email not verified');
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }

    public function logout()
    {
        try {
            $this->model->auth->logOutEverywhere();
            $this->model->auth->destroySession();
        } catch (\Delight\Auth\NotLoggedInException $e) {
        } finally {
            Helper::redirect('login');
        }
    }
}
