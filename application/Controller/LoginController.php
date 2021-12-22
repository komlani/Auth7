<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\LoginService;

class LoginController
{
    private LoginService $service;

    public function __construct()
    {
        Helper::isLoggedIn();

        $this->service = new LoginService();
    }

    public function index(): void
    {
        view('_templates/auth/header', [
            'pageTitle' => Title::set('Login'),
        ]);
        view('auth/login');
        view('_templates/auth/footer');
    }

    public function store(): void
    {
        $this->service->manageRequest($_POST);
    }

    public function destroy(): void
    {
        $this->service->logout();
    }
}
