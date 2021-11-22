<?php

namespace Auth7\Controller;

use Auth7\Libs\Helper;
use Auth7\Services\RegisterService;

class RegisterController
{
    private $service;

    public function __construct()
    {
        Helper::isLoggedIn();

        $this->service = new RegisterService();
    }

    public function index()
    {
        view('_templates/auth/header');
        view('auth/register');
        view('_templates/auth/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }

    /** we verify user's email and 
     * update the users table */
    public function verifyEmail()
    {
        $this->service->verifyEmail($_GET);
    }
}
