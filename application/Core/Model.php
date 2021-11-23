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
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

            if (DB_TYPE == "pgsql") {
                $databaseEncodingenc = " options='--client_encoding=" . DB_CHARSET . "'";
            } else {
                $databaseEncodingenc = "; charset=" . DB_CHARSET;
            }

            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . $databaseEncodingenc, DB_USER, DB_PASS, $options);
            $this->auth = new Auth($this->db, null, null, false, null, null);
        } catch (\PDOException $e) {
            exit('Database connection could not be established.'); //TODO: error 503 page
        }
    }
}
