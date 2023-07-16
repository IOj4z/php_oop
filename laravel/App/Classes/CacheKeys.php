<?php

namespace App\Classes;

use App\Models\User;

class CacheKeys
{
    public static function getUserByIdKey(int $id)
    {
        return sprintf('user_%d_%d', $id, User::VERSION);
    }

    public static function getUserByEmailKey(string $email)
    {
        return sprintf('user_email_%s_%d', $email, User::VERSION);
    }

}