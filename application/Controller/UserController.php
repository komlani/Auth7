<?php

namespace Auth7\Controller;

use Auth7\Libs\Title;

class UserController
{
    public function __construct()
    {
    }

    public function index()
    {
        view('_templates/dashboard/header',[
            'pageTitle' => Title::set('Users'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/index');
        view('_templates/dashboard/footer');
    }

    public function show($id)
    {
        view('_templates/dashboard/header',[
            'pageTitle' => Title::set('View User'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/show');
        view('_templates/dashboard/footer');
    }

    public function create()
    {
        view('_templates/dashboard/header',[
            'pageTitle' => Title::set('Add User'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/create');
        view('_templates/dashboard/footer');
    }

    public function store()
    {
        var_dump("ready to create new user");
        exit;
    }

    public function edit($id)
    {
        view('_templates/dashboard/header',[
            'pageTitle' => Title::set('Edit User'),
        ]);
        view('_templates/dashboard/sidebar');
        view('_templates/dashboard/top-navigation');
        view('dashboard/users/edit');
        view('_templates/dashboard/footer');
    }

    public function delete($id)
    {
        view('_templates/dashboard/header',[
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
