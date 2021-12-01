<?php

namespace Auth7\Services;

use Auth7\Model\UserModel;

class UserService
{
    public $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }
}
