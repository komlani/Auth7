<?php

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\ResetPasswordService;

class ResetPasswordController
{
    private $service;

    public function __construct()
    {
        Helper::isLoggedIn();
        Helper::canResetPassword();

        $this->service = new ResetPasswordService();
    }

    public function index()
    {
        view('_templates/auth/header',[
            'pageTitle' => Title::set('Reset Password'),
        ]);
        view('auth/reset-password',);
        view('_templates/auth/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }

    public function verifyAttempt()
    {
        $this->service->verifyAttempt($_GET);
    }
}
