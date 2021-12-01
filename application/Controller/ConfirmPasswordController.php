<?php

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\ConfirmPasswordService;

class ConfirmPasswordController
{
    private $service;

    public function __construct()
    {
        Helper::isLoggedOut();

        $this->service = new ConfirmPasswordService();
    }

    public function index()
    {
        view('_templates/auth/header',[
            'pageTitle' => Title::set('Confirm Password'),
        ]);
        view('auth/confirm-password');
        view('_templates/auth/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }
}
