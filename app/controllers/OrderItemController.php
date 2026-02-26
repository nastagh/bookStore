<?php

$base = dirname(__DIR__, 2);
require_once __DIR__ . '/../models/OrderItem.php';
require_once __DIR__ . '/OrderController.php';
require_once $base . '/REST/vendor/autoload.php';
require_once $base . '/REST/vendor/firebase/php-jwt/src/JWT.php';
require_once $base . '/REST/vendor/firebase/php-jwt/src/Key.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class OrderItemController
{
    public static function create()
    {
        $config = require dirname(__DIR__, 2) . '/REST/app/config/jwt.php';
        $token = $_GET['token'];

        $payload = JWT::decode($token, new Key($config['secret_key'], $config['algorithm']));
        $id_user = $payload->user->id;

        $id_book = $_GET['id_book'] ?? null;
        $quantity = $_GET['quantity'] ?? 1;
        $price = $_GET['price'] ?? null;


        $id_order = OrderController::create($id_user, date('Y-m-d H:i:s'), $price);
        OrderItem::create($id_order, $id_book, $quantity, $price);

        header('Location: index.php');
        exit;
    }
}