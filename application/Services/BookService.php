<?php

declare(strict_types=1);

namespace Auth7\Services;

use Auth7\Libs\Helper;
use Auth7\Model\BookModel;
use Rakit\Validation\Validator;

use function Auth7\Controller\redirect;

class BookService
{
    protected BookModel $book;

    public function __construct()
    {
        $this->book = new BookModel();
    }

    public function store(array $formData): void
    {
        $validation = (new Validator)->validate($formData, [
            '_token' => 'required|alpha_num',
            'title' => 'required|min:2',
        ]);

        Helper::checkToken();

        if ($validation->fails()) {
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();
        } else {
            if ($this->book->store(data: [
                'title' => $formData['title']
            ])) {
                $_SESSION['insertion_succeded'] = true;
            } else {
                $_SESSION['insertion_failed'] = true;
            }
        }

        redirect('book/create');
    }

    public function update(array $formData): void
    {
        $validation = (new Validator)->validate($formData, [
            '_token' => 'required|alpha_num',
            'book_id' => 'required',
            'title' => 'required|min:2',
        ]);

        Helper::checkToken();

        if ($validation->fails()) {
            if (!$this->book->exist(bookId: (int)$formData['book_id'])) {
                //TODO: edit book id error page
                die('edit id error');
            }
            
            $_SESSION['validated'] = $validation->getValidatedData();
            $_SESSION['errors'] = $validation->errors->firstOfAll();
        } else {
            if ($this->book->update(data: [
                'id' => $formData['book_id'],
                'title' => $formData['title'],
            ])) {
                $_SESSION['edition_succeded'] = true;
            } else {
                $_SESSION['edition_failed'] = true;
            }
        }

        redirect('book/edit/' . (int)$formData['book_id']);
    }

    function destroy(array $formData): void
    {
        if (!$this->book->exist(bookId: (int)$formData['book_id'])) {
            //TODO: edit book id error page
            die('edit id error');
        }

        if ($this->book->destroy(bookId: (int)$formData['book_id'])) {
            $_SESSION['deleted'] = true;
            redirect('book');
        }
    }
}
