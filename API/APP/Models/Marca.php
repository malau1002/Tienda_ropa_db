<?php

namespace App\Models;

use Config\Database;

class Marca {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM marcas");
        $query->execute();
        return $query->fetchAll();
    }

    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM marcas WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }

    public function create($data) {
        $query = $this->db->prepare("INSERT INTO marcas (nombre) VALUES (:nombre)");
        return $query->execute($data);
    }

    public function update($id, $data) {
        $query = $this->db->prepare("UPDATE marcas SET nombre = :nombre WHERE id = :id");
        $data['id'] = $id;
        return $query->execute($data);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM marcas WHERE id = :id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
}
