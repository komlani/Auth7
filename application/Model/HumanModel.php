<?php

namespace Auth7\Model;

use Auth7\Core\Model;

class HumanModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getHumanInfo($userId)
    {
        $sql = "SELECT 
                    users.id, 
                    users.email, 
                    users.password, 
                    users.registered, 
                    users.last_login,
                    humans.id as human_id, 
                    humans.user_id, 
                    humans.avatar,
                    humans.first_name, 
                    humans.last_name, 
                    humans.phone, 
                    humans.updated
                FROM users 
                INNER JOIN humans
                ON (users.id = humans.user_id)
                WHERE users.id = :userId";

        $query = $this->db->prepare($sql);
        $parameters = array(':userId' => $userId);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function updateAvatar($data)
    {
        $sql = "UPDATE 
                    humans
                SET avatar = :avatar, 
                    updated = :updated
                WHERE user_id = :userId";

        $query = $this->db->prepare($sql);
        $parameters = [
            ':avatar' => $data['filenameWithExtension'],
            ':userId' => $data['userId'],
            ':updated' => time(),
        ];

        return ($query->execute($parameters) ? true : false);
    }

    public function updateGeneralInfo($data)
    {
        $sql = "UPDATE 
                    humans
                SET first_name  = :first_name,
                    last_name  = :last_name,
                    phone = :phone,
                    updated = :updated
                WHERE user_id = :userId";

        $query = $this->db->prepare($sql);
        $parameters = [
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':phone' => $data['phone'],
            ':updated' => time(),
            ':userId' => $_SESSION['auth7_userId'],
        ];

        $query->execute($parameters);

        return $this;
    }

    public function updated($id)
    {
        $sql = "UPDATE 
                    humans
                SET updated = :updated
                WHERE user_id = :userId";

        $query = $this->db->prepare($sql);
        $parameters = [
            ':updated' => time(),
            ':userId' => $id,
        ];

        $query->execute($parameters);

        return $this;
    }
}
