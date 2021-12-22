<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\RegisterService;

class RegisterController
{
    private RegisterService $service;

    public function __construct()
    {
        Helper::isLoggedIn();

        $this->service = new RegisterService();
    }

    public function index(): void
    {
        view('_templates/auth/header', [
            'pageTitle' => Title::set('Register'),
        ]);
        view('auth/register');
        view('_templates/auth/footer');
    }

    public function store(): void
    {
        $this->service->manageRequest($_POST);
    }

    /** we verify user's email and 
     * update the users table */
    public function verifyEmail(): void
    {
        $this->service->verifyEmail($_GET);
    }
}
