<?php

namespace Auth7\Controller;

use Auth7\Libs\Helper;
use Auth7\Services\LoginService;

class LoginController
{
    private $service;

    public function __construct()
    {
        Helper::isLoggedIn();

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
        $this->service->logout();
    }
}
