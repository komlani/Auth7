<?php

declare(strict_types=1);

namespace Auth7\Model;

use Auth7\Core\Model;

class BookModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        $sql = "SELECT 
                    id, 
                    title 
                FROM 
                    books";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function get(int $bookId): mixed
    {
        $sql = "SELECT 
                   id, 
                   title 
                FROM books 
                WHERE id = :bookId";

        $query = $this->db->prepare($sql);
        $parameters = [':bookId' => $bookId];

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function store(array $data): bool
    {
        $sql = "INSERT INTO
                    books(title, registered, added_by)
                VALUES
                (:title, :registered, :added_by)";

        $query = $this->db->prepare($sql);
        $parameters = [
            ':title' => $data['title'],
            ':registered' => time(),
            'added_by' => $_SESSION['auth7_userId'],
        ];

        return $query->execute($parameters);
    }

    public function update(array $data): bool
    {
        $sql = "UPDATE
                    books
                SET
                    title = :title
                where
                    id = :id";
        $query = $this->db->prepare($sql);
        $parameters = [
            ':title' => $data['title'],
            ':id' => $data['id'],
        ];

        return $query->execute($parameters);
    }

    public function destroy(int $bookId): bool
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $query = $this->db->prepare($sql);

        $parameters = [':id' => $bookId];

        return $query->execute($parameters);
    }

    public function exist(int $bookId): mixed
    {
        $sql = "SELECT 
                    id
                FROM
                    books
                WHERE
                    id = :id
                LIMIT 1";

        $query = $this->db->prepare($sql);

        $parameters = [':id' => $bookId];
        $query->execute($parameters);

        return $query->fetch();
    }
}
