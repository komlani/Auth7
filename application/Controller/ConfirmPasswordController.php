<?php

namespace Mini\Controller;

class ConfirmPasswordController
{
    public function __construct()
    {
    }

    public function index()
    {
        view('_templates/auth/header');
        view('auth/confirm-password');
        view('_templates/auth/footer');
    }
}
