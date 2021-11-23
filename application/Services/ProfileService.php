<?php

namespace Auth7\Services;

use Auth7\Model\HumanModel;

class ProfileService
{
    public $model;

    public function __construct()
    {
        $this->model = new HumanModel();
    }

    public function humanInfo()
    {
        return ($_SESSION['auth7_userId']
            ? $this->model->getHumanInfo($_SESSION['auth7_userId'])
            : false);
    }
}
