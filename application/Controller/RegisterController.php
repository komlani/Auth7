<?php

namespace Mini\Controller;

class RegisterController
{
    public function __construct()
    {      
    }
    
    public function index()
    {
        view('_templates/auth/header');
        view('auth/register');
        view('_templates/auth/footer');
    }
}