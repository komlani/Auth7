<?php

namespace Mini\Controller;

class VerifyEmailController
{
    public function __construct()
    {
    }
    
    public function index()
    {
        view('_templates/auth/header');
        view('auth/verify-email');
        view('_templates/auth/footer');
    }
}
