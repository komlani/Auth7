<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;

class HomeController
{
    public function index(): void
    {
        view('_templates/client/header', [
            'pageTitle' => Title::set('Home'),
        ]);
        view('client/home');
        view('_templates/client/footer');
    }
}
