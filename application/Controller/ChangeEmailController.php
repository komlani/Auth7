<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\ChangeEmailService;

class ChangeEmailController
{
    private ChangeEmailService $service;

    public function __construct()
    {
        Helper::isLoggedOut();

        $this->service = new ChangeEmailService();
    }

    public function index(): void
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Change Email'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/profile/change-email');
        view('_templates/dashboard/footer');
    }

    public function store(): void
    {
        $this->service->manageRequest($_POST);
    }

    public function verifyEmail(): void
    {
        $this->service->verifyEmail($_GET);
    }
}
