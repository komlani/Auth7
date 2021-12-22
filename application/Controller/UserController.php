<?php

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Services\UserService;

class UserController
{
    private $service;

    public function __construct()
    {
        
        $this->service = new UserService();
    }

    public function index()
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Users'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/index', [
            'users' => $this->service->all(),
        ]);
        view('_templates/dashboard/footer');
    }

    public function show($userId)
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('View User'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/show', [
            'user' => $this->service->get($userId),
        ]);
        view('_templates/dashboard/footer');
    }

    public function create()
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Add User'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/create');
        view('_templates/dashboard/footer');
    }

    public function store()
    {
        $this->service->manageRequest($_POST);
    }

    public function edit($userId)
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Edit User'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/edit', [
            'user' => $this->service->get($userId),
        ]);
        view('_templates/dashboard/footer');
    }

    public function delete($userId)
    {
        view('_templates/dashboard/header', [
            'pageTitle' => Title::set('Delete User'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/delete');
        view('_templates/dashboard/footer');
    }

    public function destroy()
    {
        die('i am ready to destroy');
    }
}
