<?php

namespace Auth7\Controller;

use Auth7\Libs\Helper;
use Auth7\Services\ProfileService;

class ProfileController
{
    private $profileService;

    public function __construct()
    {
        Helper::isLoggedOut();

        $this->profileService = new ProfileService();
    }

    public function index()
    {  
        view('_templates/dashboard/header');
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/profile/index',[
            'humanInfo' => $this->profileService->humanInfo(),
        ]);
        view('_templates/dashboard/footer');
    }

    public function edit($id)
    {
        var_dump($id);
    }

    public function update()
    {
        var_dump($_POST);exit;
    }
}