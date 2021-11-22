<?php

namespace Auth7\Controller;

use Auth7\Libs\Helper;

class DashboardController
{
    public function __construct()
    {
        Helper::isLoggedOut();
    }

    public function index()
    {
        view('_templates/dashboard/header');
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('_templates/dashboard/top-tiles');
        view('dashboard/main');
        view('_templates/dashboard/footer');
    }
}
