<?php

// Don't send PHP warnings/notices to output (would break JSON)
ini_set('display_errors', '0');
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ .'/../app/core/Router.php';

$method = $_SERVER['REQUEST_METHOD']; //Gets the HTTP method of the request
$uri =$_SERVER['REQUEST_URI'];

$uri = preg_replace('#^/Certificado/bookStore/REST/public(/index\.php)?#', '', $uri);
$uri = trim($uri, '/');

$data = json_decode(file_get_contents('php://input'), true);

$router = new Router();
$router->route($method, $uri, $data);


?>