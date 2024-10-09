<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    public function authenticateUser($email, $password)
    {
        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            return ['status' => 'ok', 'message' => 'Hello ' . $user['name'] . ', you are logged in as ' . $user['role']];
        } else {
            return ['status' => 'error', 'message' => 'Invalid credentials'];
        }
    }
}