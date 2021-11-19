<?php

namespace Mini\Controller;

class ForgotPasswordController
{
    public function __construct()
    {   
    }
    
    public function index()
    {
        view('_templates/auth/header');
        view('auth/forgot-password');
        view('_templates/auth/footer');
    }
}