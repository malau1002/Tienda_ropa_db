<?php

require_once 'config/database.php';

use Config\Database;

try {
    $connection = Database::connect();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage();
}
