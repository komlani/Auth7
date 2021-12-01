<?php

namespace Auth7\Libs;

class Title
{
    public static function set($title)
    {
        return ucwords(strtolower($title)) ?? '' ;
    }
}