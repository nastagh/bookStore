<?php

header('Content-Type: application/json');
require_once __DIR__ .'/../app/core/Router.php';

$method = $_SERVER['REQUEST_METHOD']; //Gets the HTTP method of the request
$uri =$_SERVER['REQUEST_URI'];

$uri = preg_replace('#^/Certificado/bookStore/REST/public(/index\.php)?#', '', $uri);
$uri = trim($uri, '/');

$data = json_decode(file_get_contents('php://input'), true);

$router = new Router();
$router->route($method, $uri, $data);


?>