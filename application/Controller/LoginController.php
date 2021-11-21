<?php

namespace Auth7\Controller;

use Auth7\Libs\Helper;
use Auth7\Services\LoginService;

class LoginController
{
    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }

    public function index()
    {
        view('_templates/auth/header');
        view('auth/login');
        view('_templates/auth/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }

    public function destroy()
    {
        session_start();

        /** unset all variables */
        $_SESSION = array();

        session_destroy();
        redirect('login');
    }
}
