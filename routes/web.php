<?php

use App\Controllers\AuthController;

$authController = new AuthController();

if ($_SERVER['REQUEST_URI'] === '/api/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {	
    $authController->login();
}

