<?php

namespace App\Models;

use PDO;
use PDOException;

class User
{
    public static function findByEmail($email)
	{
	    require __DIR__ . '/../../config/db.php';

	    try {
	        $query = 'SELECT * FROM users WHERE email = :email LIMIT 1';
	        $stmt = $pdo->prepare($query);
	        $stmt->execute(['email' => $email]);

	        return $stmt->fetch(PDO::FETCH_ASSOC);
	    } catch (Exception $e) {
	        error_log('Database error: ' . $e->getMessage());
	        return null; // Return null if there’s an error
	    }
	}
}

