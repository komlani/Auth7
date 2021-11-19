<?php

namespace Mini\Controller;

class ResetPasswordController
{
    public function __construct()
    {       
    }
    
    public function index()
    {
        view('_templates/auth/header');
        view('auth/reset-password');
        view('_templates/auth/footer');
    }
}