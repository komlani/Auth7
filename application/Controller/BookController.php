<?php

declare(strict_types=1);

namespace Auth7\Controller;

use Auth7\Libs\Title;
use Auth7\Libs\Helper;
use Auth7\Model\BookModel;
use Auth7\Services\BookService;

class BookController
{
    private BookModel $book;
    private BookService $service;

    public function __construct()
    {
        Helper::isLoggedOut();

        $this->book = new BookModel();
        $this->service = new BookService();
    }

    public function index(): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set(title: 'Books'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: 'dashboard/books/index', data: [
            'books' => $this->book->getAll(),
        ]);
        view(file: '_templates/dashboard/footer');
    }

    public function show(int $id): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set(title: 'View Book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: 'dashboard/books/show', data: [
            'book' => $this->book->get(bookId: $id),
        ]);
        view(file: '_templates/dashboard/footer');
    }

    public function create(): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set('Create book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: 'dashboard/books/create');
        view(file: '_templates/dashboard/footer');
    }

    public function store(): void
    {
        $this->service->store(formData: $_POST);
    }

    public function edit(int $id): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set(title: 'Edit Book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: 'dashboard/books/edit', data: [
            'book' => $this->book->get(bookId: $id),
        ]);
        view(file: '_templates/dashboard/footer');
    }

    public function update(): void
    {
        $this->service->update(formData: $_POST);
    }

    public function delete(int $id): void
    {
        view(file: '_templates/dashboard/header', data: [
            'pageTitle' => Title::set(title: 'Delete Book'),
        ]);
        view(file: '_templates/dashboard/sidebar');
        view(file: '_templates/dashboard/top-navigation');
        view(file: 'dashboard/books/delete', data: [
            'book' => $this->book->get(bookId: $id),
        ]);
        view(file: '_templates/dashboard/footer');
    }

    public function destroy(): void
    {
        $this->service->destroy(formData: $_POST);
    }
}
