<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Services\ProfileService;

class ProfileController
{
    private ProfileService $profileService;

    public function __construct()
    {
        Helper::isLoggedOut();

        $this->profileService = new ProfileService();
    }

    public function index(): void
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Profile'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/profile/index', [
            'profileData' => $this->profileService->profileData(),
        ]);
        view('_templates/dashboard/footer');
    }

    public function edit(int $id): void
    {
        Helper::isMe($id);

        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Edit Profile'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/profile/edit', [
            'profileData' => $this->profileService->profileData($id),
        ]);
        view('_templates/dashboard/footer');
    }

    public function update(): void
    {
        $this->profileService->manageRequest($_POST);
    }
}
