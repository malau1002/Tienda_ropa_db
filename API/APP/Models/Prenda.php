<?php

namespace App\Models;

use Config\Database;

class Prenda {
    private $db;

    public function __construct() {
        // Conexión a la base de datos
        $this->db = Database::connect();
    }

    // Obtener todas las prendas
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM prendas");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Obtener una prenda por ID
    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM prendas WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    // Insertar una nueva prenda
    public function create($data) {
        $query = $this->db->prepare("
            INSERT INTO prendas (nombre, talla, color, precio, stock, marca_id) 
            VALUES (:nombre, :talla, :color, :precio, :stock, :marca_id)
        ");
        return $query->execute([
            ':nombre' => $data['nombre'],
            ':talla' => $data['talla'],
            ':color' => $data['color'],
            ':precio' => $data['precio'],
            ':stock' => $data['stock'],
            ':marca_id' => $data['marca_id']
        ]);
    }

    // Actualizar una prenda existente
    public function update($id, $data) {
        $query = $this->db->prepare("
            UPDATE prendas 
            SET nombre = :nombre, talla = :talla, color = :color, 
                precio = :precio, stock = :stock, marca_id = :marca_id
            WHERE id = :id
        ");
        return $query->execute([
            ':id' => $id,
            ':nombre' => $data['nombre'],
            ':talla' => $data['talla'],
            ':color' => $data['color'],
            ':precio' => $data['precio'],
            ':stock' => $data['stock'],
            ':marca_id' => $data['marca_id']
        ]);
    }

    // Eliminar una prenda
    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM prendas WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
}
