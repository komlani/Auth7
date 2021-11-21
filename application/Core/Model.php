<?php

namespace Auth7\Core;

use PDO;
use Delight\Auth\Auth;

class Model
{
    public $db;
    public $auth;

    function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=auth7;host=localhost;charset=utf8mb4', 'root', '');
            $this->auth = new Auth($this->db, null, null, false, null, null);
        } catch (\PDOException $e) {
            exit('Database connection could not be established.'); //TODO: error 503 page
        }
    }
}
