<?php

namespace App\Services;

use App\Models\User;

class RegisterService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public function registerUser($data) {
        // Logic to register a new user
        $user = User::create($data);
        return $user;
    }
}
