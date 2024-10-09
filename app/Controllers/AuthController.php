<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        $payload = json_decode(file_get_contents('php://input'), true);

        echo $payload;exit;

        if (!isset($payload['email'], $payload['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid payload']);
            return;
        }

        $response = $this->authService->authenticateUser($payload['email'], $payload['password']);
        echo json_encode($response);
    }
}