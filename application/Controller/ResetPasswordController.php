<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\ResetPasswordService;

class ResetPasswordController
{
    private ResetPasswordService $service;

    public function __construct()
    {
        Helper::isLoggedIn();
        Helper::canResetPassword();

        $this->service = new ResetPasswordService();
    }

    public function index(): void
    {
        view('_templates/auth/header', [
            'pageTitle' => Title::set('Reset Password'),
        ]);
        view('auth/reset-password',);
        view('_templates/auth/footer');
    }

    public function store(): void
    {
        $this->service->manageRequest($_POST);
    }

    public function verifyAttempt(): void
    {
        $this->service->verifyAttempt($_GET);
    }
}
