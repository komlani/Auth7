<?php

namespace Auth7\Services;

use Auth7\Core\Model;
use Auth7\Libs\Helper;
use Rakit\Validation\Validator;

class ChangeEmailService
{
    public $email;
    public $model;

    public function __construct()
    {
        $this->email = new EmailService();
        $this->model = new Model();
    }

    public function manageRequest($data)
    {
        Helper::checkToken();

        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'newEmail' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();

            Helper::redirect('changeEmail');
        } else {

            try {

                if ($this->model->auth->reconfirmPassword($_POST['password'])) {

                    $this->model->auth->changeEmail($_POST['newEmail'], function ($selector, $token) {
                        $this->email->sendEmailChangeNotification($selector, $token, $_POST['newEmail']);
                    });
                } else {
                    Helper::redirect('changeEmail'); //TODO: define action denied error page
                }
            } catch (\Delight\Auth\UserAlreadyExistsException $e) {
                $_SESSION['email_already_exists'] = true;
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                $_SESSION['too_many_request'] = true;
            } finally {
                Helper::redirect('changeEmail');
            }
        }
    }
}
