<?php

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Auth7\Libs\Policy;
use Auth7\Model\UserModel;
use Rakit\Validation\Validator;

class UserService
{
    public $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function manageRequest($data)
    {
        $validation = (new Validator)->validate($data, [
            '_token' => 'required|alpha_num',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'roles' => 'array|nullable',
        ]);

        if ($validation->fails()) {
            
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();
          
            var_dump($_SESSION['validated']['roles'][0]); exit;

            Helper::redirect('user/create');
        } else {

            Helper::checkToken();

            var_dump($data);
            exit;
        }
    }
}
