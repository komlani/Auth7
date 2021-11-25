<?php

namespace Auth7\Controller;

use Auth7\Libs\Helper;
use Auth7\Services\ChangeEmailService;

class ChangeEmailController
{
    private $service;

    public function __construct()
    {
        Helper::isLoggedOut();

        $this->service = new ChangeEmailService();
    }

    public function index()
    {
        view('_templates/dashboard/header');
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/profile/change-email');
        view('_templates/dashboard/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }
}
