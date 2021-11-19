<?php

namespace Mini\Controller;

class LoginController
{
    public function __construct()
    {       
    }
    
    public function index()
    {
        view('_templates/auth/header');
        view('auth/login');
        view('_templates/auth/footer');
    }
}
