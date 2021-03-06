<?php

namespace Auth7\Services;

use Auth7\Core\Model;
use Auth7\Libs\Helper;
use Rakit\Validation\Validator;

class LoginService
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
            'email' => 'required|email',
            'password' => 'required|min:8',
            'remember_me' => 'nullable|boolean',
        ]);

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();

            Helper::redirect('login');
        } else {

            Helper::checkToken();

            try {

                if (isset($_POST['remember_me']))
                    $_POST['remember'] = $_POST['remember_me'];

                $rememberDuration = (isset($_POST['remember']) && $_POST['remember'] == 1)
                    ? (int) (60 * 60 * 24 * 365.25)
                    : null;

                $this->model->auth->login($_POST['email'], $_POST['password'], $rememberDuration);

                $_SESSION['auth7_userId'] = $this->model->auth->getUserId();

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
            $this->model->auth->destroySession();
            $this->model->auth->logOut();
        } catch (\Delight\Auth\NotLoggedInException $e) {
        } finally {
            Helper::redirect('login');
        }
    }
}