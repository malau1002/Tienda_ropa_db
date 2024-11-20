<?php

namespace App\Controllers;

use App\Models\Prenda;

class PrendasController {
    private $model;

    public function __construct() {
        $this->model = new Prenda();
    }

    public function index() {
        $prendas = $this->model->getAll();
        echo json_encode($prendas);
    }

    public function show($id) {
        $prenda = $this->model->getById($id);
        echo json_encode($prenda);
    }

    public function store() {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->model->create($data)) {
            echo json_encode(["message" => "Prenda creada con éxito"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Error al crear la prenda"]);
        }
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->model->update($id, $data)) {
            echo json_encode(["message" => "Prenda actualizada con éxito"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Error al actualizar la prenda"]);
        }
    }

    public function destroy($id) {
        if ($this->model->delete($id)) {
            echo json_encode(["message" => "Prenda eliminada con éxito"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Error al eliminar la prenda"]);
        }
    }
}
