<?php

namespace App\Controllers;

use Config\Database;

class ReportesController {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Reporte 1: Listar todas las marcas con al menos una venta
    public function marcasConVentas() {
        $query = $this->db->prepare("
            SELECT DISTINCT m.nombre 
            FROM marcas m
            INNER JOIN prendas p ON m.id = p.marca_id
            INNER JOIN ventas v ON p.id = v.prenda_id
        ");
        $query->execute();
        $result = $query->fetchAll();
        echo json_encode($result);
    }

    // Reporte 2: Mostrar las prendas vendidas junto con la cantidad restante en stock
    public function prendasVendidasConStock() {
        $query = $this->db->prepare("
            SELECT p.nombre, p.stock, SUM(v.cantidad) AS total_vendido 
            FROM prendas p
            INNER JOIN ventas v ON p.id = v.prenda_id
            GROUP BY p.id
        ");
        $query->execute();
        $result = $query->fetchAll();
        echo json_encode($result);
    }

    // Reporte 3: Listar las 5 marcas más vendidas con cantidad de ventas
    public function topMarcas() {
        $query = $this->db->prepare("
            SELECT m.nombre, SUM(v.cantidad) AS total_vendido 
            FROM marcas m
            INNER JOIN prendas p ON m.id = p.marca_id
            INNER JOIN ventas v ON p.id = v.prenda_id
            GROUP BY m.id
            ORDER BY total_vendido DESC
            LIMIT 5
        ");
        $query->execute();
        $result = $query->fetchAll();
        echo json_encode($result);
    }
}
