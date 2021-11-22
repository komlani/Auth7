<?php

namespace Auth7\Controller;

class HomeController
{
    public function __construct()
    {
    }

    public function index()
    {
        view('_templates/client/header');
        view('client/home');
        view('_templates/client/footer');
    }
}
