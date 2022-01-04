<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;

class BookController
{
    public function __construct()
    {
    }

    public function index(): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set('Books'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: '_templates/dashboard/top-tiles');
        view(file: 'dashboard/books/index', data: []);
        view(file: '_templates/dashboard/footer');
    }

    public function show(): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set('View Book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: '_templates/dashboard/top-tiles');
        view(file: 'dashboard/books/show');
        view(file: '_templates/dashboard/footer');
    }

    public function create(): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set('Create book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: '_templates/dashboard/top-tiles');
        view(file: 'dashboard/books/create');
        view(file: '_templates/dashboard/footer');
    }

    public function store(): void
    {
    }

    public function edit(int $bookId): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set(title: 'Edit Book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: 'dashboard/books/edit', data: []);
        view(file: '_templates/dashboard/footer');
    }

    public function delete(int $bookId): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set('Delete Book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: 'dashboard/books/delete', data: []);
        view(file: '_templates/dashboard/footer');
    }

    public function destroy(int $bookId): void
    {
        var_dump(value: $bookId);
    }
}
