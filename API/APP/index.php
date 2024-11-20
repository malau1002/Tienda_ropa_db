<?php

require_once '../vendor/autoload.php';  // Carga las dependencias de Composer (si tienes autoload configurado)

use App\Controllers\PrendasController;
use App\Controllers\MarcasController;
use App\Controllers\ReportesController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);  // Obtener la URI solicitada
$method = $_SERVER['REQUEST_METHOD'];  // Obtener el método HTTP de la solicitud (GET, POST, etc.)

// Instanciar los controladores
$controllerPrendas = new PrendasController();
$controllerMarcas = new MarcasController();
$controllerReportes = new ReportesController();

// Definir las rutas para el controlador de prendas
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

// Definir las rutas para el controlador de marcas
} elseif (preg_match('#^/marcas$#', $uri) && $method === 'GET') {
    $controllerMarcas->index();
} elseif (preg_match('#^/marca/(\d+)$#', $uri, $matches) && $method === 'GET') {
    $controllerMarcas->show($matches[1]);
} elseif (preg_match('#^/marca$#', $uri) && $method === 'POST') {
    $controllerMarcas->store();
} elseif (preg_match('#^/marca/(\d+)$#', $uri, $matches) && $method === 'PUT') {
    $controllerMarcas->update($matches[1]);
} elseif (preg_match('#^/marca/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
    $controllerMarcas->destroy($matches[1]);

// Definir las rutas para el controlador de reportes
} elseif (preg_match('#^/reportes/marcas-con-ventas$#', $uri) && $method === 'GET') {
    $controllerReportes->marcasConVentas();
} elseif (preg_match('#^/reportes/prendas-vendidas$#', $uri) && $method === 'GET') {
    $controllerReportes->prendasVendidasConStock();
} elseif (preg_match('#^/reportes/top-marcas$#', $uri) && $method === 'GET') {
    $controllerReportes->topMarcas();

// Ruta no encontrada
} else {
    http_response_code(404);  // Establece el código de estado 404 para rutas no encontradas
    echo json_encode(["message" => "Ruta no encontrada"]);
}
