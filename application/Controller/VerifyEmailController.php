<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\VerifyEmailService;

class VerifyEmailController
{
    private VerifyEmailService $service;

    public function __construct()
    {
        Helper::isLoggedOut();

        $this->service = new VerifyEmailService();
    }

    public function index(): void
    {
        view('_templates/auth/header', [
            'pageTitle' => Title::set('Verify Email'),
        ]);
        view('auth/verify-email');
        view('_templates/auth/footer');
    }

    public function store(): void
    {
        $this->service->manageRequest($_POST);
    }
}
