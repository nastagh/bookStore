<?php

$base = dirname(__DIR__, 2);
require_once __DIR__ . '/../models/OrderItem.php';
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../controllers/OrderController.php';
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
        $token =$_GET['token'];

        $payload = JWT::decode($token, new Key($config['secret_key'], $config['algorithm']));
        $id_user = $payload->user->id ?? $payload->user->id_user ?? null;

        $id_book = $_GET['id_book'] ?? null;
        $quantity = (int)$_GET['quantity'];
        $price = (float) $_GET['price'];

        $itemTotal = $price * max(1, $quantity);

        $existingOrder = OrderController::getLatestOrderByUserId($id_user);
        if ($existingOrder) {
            $id_order = (int) $existingOrder['id_order'];
            OrderItem::create($id_order, $id_book, $quantity, $price);
            OrderController::updateTotalPrice($id_order, $itemTotal);
        } else {
            $id_order = OrderController::create($id_user, date('Y-m-d H:i:s'), $itemTotal);
            OrderItem::create($id_order, $id_book, $quantity, $price);
        }

        header('Location: index.php');
        exit;
    }

    public static function getOrderItemsByOrderId($id_order) {
        $orderItems = OrderItem::getOrderItemsByOrderId($id_order);
        return $orderItems;
    }

    public static function getFullOrderInfo($id_order) {
        $orderItems = self::getOrderItemsByOrderId($id_order);
        $fullOrderInfo = [];
        foreach ($orderItems as $item) {
            $id_book = $item['id_book'] ?? $item['id_book'] ?? null;
            $item['book'] = $id_book ? Book::find($id_book) : null;
            $fullOrderInfo[] = $item;
        }
        return $fullOrderInfo;
    }

    
}