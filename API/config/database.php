<?php

namespace Config;

use PDO;
use PDOException;

class Database {
    private static $host = 'localhost';
    private static $db = 'tienda_ropa';
    private static $user = 'root';
    private static $password = '';
    private static $charset = 'utf8mb4';

    public static function connect() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
            $pdo = new PDO($dsn, self::$user, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
