<?php

require_once '../vendor/autoload.php';

use App\Controllers\PrendasController;
use App\Controllers\MarcasController;
use App\Controllers\ReportesController;

// Obtiene la URI solicitada y el método HTTP
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Instanciar los controladores
$controllerPrendas = new PrendasController();
$controllerMarcas = new MarcasController();
$controllerReportes = new ReportesController();

// Rutas para el controlador de prendas
if (preg_match('#^/prendas$#', $uri) && $method === 'GET') {
    $controllerPrendas->index();
} elseif (preg_match('#^/prenda/(\d+)$#', $uri, $matches) && $method === 'GET') {
    $controllerPrendas->show($matches[1]);
} elseif (preg_match('#^/prenda$#', $uri) && $method === 'POST') {
    $controllerPrendas->store();
} elseif (preg_match('#^/prenda/(\d+)$#', $uri, $matches) && $method === 'PUT') {
    $controllerPrendas->update($matches[1]);
} elseif (preg_match('#^/prenda/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
    $controllerPrendas->destroy($matches[1]);
}

// Rutas para el controlador de marcas
elseif (preg_match('#^/marcas$#', $uri) && $method === 'GET') {
    $controllerMarcas->index();
} elseif (preg_match('#^/marca/(\d+)$#', $uri, $matches) && $method === 'GET') {
    $controllerMarcas->show($matches[1]);
} elseif (preg_match('#^/marca$#', $uri) && $method === 'POST') {
    $controllerMarcas->store();
} elseif (preg_match('#^/marca/(\d+)$#', $uri, $matches) && $method === 'PUT') {
    $controllerMarcas->update($matches[1]);
} elseif (preg_match('#^/marca/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
    $controllerMarcas->destroy($matches[1]);
}

// Rutas para el controlador de reportes
elseif (preg_match('#^/reportes/marcas-con-ventas$#', $uri) && $method === 'GET') {
    $controllerReportes->marcasConVentas();
} elseif (preg_match('#^/reportes/prendas-vendidas$#', $uri) && $method === 'GET') {
    $controllerReportes->prendasVendidasConStock();
} elseif (preg_match('#^/reportes/top-marcas$#', $uri) && $method === 'GET') {
    $controllerReportes->topMarcas();
}

// Ruta no encontrada
else {
    http_response_code(404);
    echo json_encode(["message" => "Ruta no encontrada"]);
}
