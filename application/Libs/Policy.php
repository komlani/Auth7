<?php

namespace Auth7\Libs;

use Auth7\Core\Model;
use Delight\Auth\Role;

class Policy
{
    public static function canManageUser()
    {
        return (new Model())->auth->hasAnyRole(
            Role::ADMIN,
        );
    }

    public static function canViewUser()
    {
        return (new Model())->auth->hasAnyRole(
            Role::ADMIN,
        );
    }

    public static function canEditUser()
    {
        return (new Model())->auth->hasAnyRole(
            Role::ADMIN,
        );
    }

    public static function canDeleteUser()
    {
        return (new Model())->auth->hasAnyRole(
            Role::ADMIN,
        );
    }
}
