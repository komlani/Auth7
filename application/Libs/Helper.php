<?php

namespace Auth7\Libs;

use Auth7\Core\Model;

class Helper
{
    static public function debugPDO($raw_sql, $parameters)
    {
        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {

            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }

        /*
        echo "<br> [DEBUG] Keys:<pre>";
        print_r($keys);

        echo "\n[DEBUG] Values: ";
        print_r($values);
        echo "</pre>";
        */

        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }

    static public function redirect($path)
    {
        header('location: ' . URL . $path);
    }

    static public function isLoggedIn()
    {
        if ((new Model())->auth->isLoggedIn())
            self::redirect('dashboard');
    }

    static public function isLoggedOut()
    {
        if (!(new Model())->auth->isLoggedIn())
            self::redirect('login');
    }

    static public function canResetPassword($data)
    {
        // if (isset($data['selector']) && isset($data['token'])) {
        //     if (!(new Model())->auth->canResetPassword($data['selector'], $data['token'])) {
        //         var_dump('hi');exit;
        //         self::redirect('login');
        //     }
        // } else {
        //     var_dump('ho');exit;
        //     self::redirect('login');
        // }
    }
}
