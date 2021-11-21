<?php

namespace Auth7\Controller;

use Auth7\Services\ResetPasswordService;

class ResetPasswordController
{
    private $service;

    public function __construct()
    {
        $this->service = new ResetPasswordService();
    }

    public function index()
    {
        view('_templates/auth/header');
        view('auth/reset-password');
        view('_templates/auth/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }
}
