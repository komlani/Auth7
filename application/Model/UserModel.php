<?php

namespace Auth7\Model;

use Auth7\Core\Model;


class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // get all
    public function getAll(): array
    {
        $sql = "SELECT 
                    id, 
                    email 
                FROM 
                    users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function get($userId): mixed
    {
        $sql = "SELECT 
                   id, 
                   email 
                FROM users 
                WHERE id = :userId";

        $query = $this->db->prepare($sql);
        $parameters = [':userId' => $userId];

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    // select

    // update

    // delete 

}
