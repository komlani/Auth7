<?php

namespace Mini\Controller;

class DashboardController
{
    public function __construct()
    {  
    }
    public function index()
    {
        view('_templates/auth/header');
        view('auth/dashboard');
        view('_templates/auth/footer');
    }
}