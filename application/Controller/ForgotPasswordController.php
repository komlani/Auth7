<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\ForgotPasswordService;

class ForgotPasswordController
{
    private ForgotPasswordService $service;

    public function __construct()
    {
        Helper::isLoggedIn();

        $this->service = new ForgotPasswordService();
    }

    public function index(): void
    {
        view('_templates/auth/header', [
            'pageTitle' => Title::set('Forgot Password'),
        ]);
        view('auth/forgot-password');
        view('_templates/auth/footer');
    }

    public function store(): void
    {
        $this->service->manageRequest($_POST);
    }
}
