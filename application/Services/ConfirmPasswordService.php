<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Rakit\Validation\Validator;
use Auth7\Model\ConfirmPasswordModel;

class ConfirmPasswordService
{
    public $model;

    public function __construct()
    {
        $this->model = new ConfirmPasswordModel();
    }

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
            try {
                if ($this->model->auth->reconfirmPassword($_POST['password'])) { //TODO: manage confirm pass errors messages
                    echo 'The user really seems to be who they claim to be';
                } else {
                    echo 'We can\'t say if the user is who they claim to be';
                }
            } catch (\Delight\Auth\NotLoggedInException $e) {
                die('The user is not signed in');
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }
    }
}
