<?php

namespace Auth7\Controller;

use Auth7\Libs\Helper;
use Auth7\Services\ForgotPasswordService;

class ForgotPasswordController
{
    private $service;

    public function __construct()
    {
        Helper::isLoggedIn();
        $this->service = new ForgotPasswordService();
    }

    public function index()
    {
        view('_templates/auth/header');
        view('auth/forgot-password');
        view('_templates/auth/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }
}