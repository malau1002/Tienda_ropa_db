<?php

namespace App\Controllers;

use App\Models\Marca;

class MarcasController {
    private $model;

    public function __construct() {
        $this->model = new Marca();
    }

    // Obtener todas las marcas
    public function index() {
        $marcas = $this->model->getAll();
        echo json_encode($marcas);
    }

    // Obtener una marca por ID
    public function show($id) {
        $marca = $this->model->getById($id);
        echo json_encode($marca);
    }

    // Crear una nueva marca
    public function store() {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->model->create($data)) {
            echo json_encode(["message" => "Marca creada con éxito"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Error al crear la marca"]);
        }
    }

    // Actualizar una marca
    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->model->update($id, $data)) {
            echo json_encode(["message" => "Marca actualizada con éxito"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Error al actualizar la marca"]);
        }
    }

    // Eliminar una marca
    public function destroy($id) {
        if ($this->model->delete($id)) {
            echo json_encode(["message" => "Marca eliminada con éxito"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Error al eliminar la marca"]);
        }
    }
}
