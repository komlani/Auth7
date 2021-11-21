<?php

namespace Auth7\Controller;

use Auth7\Services\VerifyEmailService;

class VerifyEmailController
{
    private $service;

    public function __construct()
    {
        $this->service = new VerifyEmailService();
    }

    public function index()
    {
        view('_templates/auth/header');
        view('auth/verify-email');
        view('_templates/auth/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }  
}
