<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Libs\Policy;

class DashboardController
{
    public function __construct()
    {
        Helper::isLoggedOut();
    }

    public function index(): void
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Dashboard'),
        ]);
        view('_templates/dashboard/sidebar', [
            'canManageUser' => Policy::canManageUser(),
        ]);
        view('_templates/dashboard/top-navigation');
        view('_templates/dashboard/top-tiles');
        view('dashboard/main');
        view('_templates/dashboard/footer');
    }
}
