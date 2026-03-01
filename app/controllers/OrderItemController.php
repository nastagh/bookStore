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
    /** Get token from cookie (preferred) or GET. Return [payload, id_user] or [null, null] and redirect to login on failure. */
    private static function getTokenAndUserId()
    {
        $token = $_GET['token'];

        try {
            $config = require dirname(__DIR__, 2) . '/REST/app/config/jwt.php';
            $payload = JWT::decode($token, new Key($config['secret_key'], $config['algorithm']));
            $id_user = $payload->user->id ?? $payload->user->id_user ?? null;
            return [$payload, $id_user];
        } catch (Throwable $e) {
            header('Location: ' . (defined('BASE_URL') ? BASE_URL : '/') . 'app/views/layout/login.php');
            exit;
        }
    }

    public static function create()
    {
        list(, $id_user) = self::getTokenAndUserId();

        $id_book = $_GET['id_book'];
        $quantity = (int) ($_GET['quantity'] ?? 1);
        $price = (float) ($_GET['price']);

        $itemTotal = $price * max(1, $quantity);

        $existingOrder = OrderController::getLatestOrderByUserId($id_user);
        if ($existingOrder) {
            $id_order = (int) ($existingOrder['id_order']);

            if(OrderItem::getOrderItemByOrderIdAndBookId($id_order, $id_book)) {
                OrderItem::updateQuantity($id_order, $id_book, $quantity+1);
                // OrderController::recalculateTotalFromItems($id_order);
                OrderController::updateTotalPrice($id_order, $itemTotal);
                header('Location: index.php');
                exit;
            }
            OrderItem::create($id_order, $id_book, $quantity, $price);
            OrderController::updateTotalPrice($id_order, $itemTotal);
        } else {
            $id_order = OrderController::create($id_user, date('Y-m-d H:i:s'), $itemTotal);
            OrderItem::create($id_order, $id_book, $quantity, $price);
        }

        header('Location: index.php');
        exit;
    }

    public static function getOrderItemsByOrderId($id_order)
    {
        $orderItems = OrderItem::getOrderItemsByOrderId($id_order);
        return $orderItems;
    }

    public static function getFullOrderInfo($id_order)
    {
        $orderItems = self::getOrderItemsByOrderId($id_order);
        $fullOrderInfo = [];
        foreach ($orderItems as $item) {
            $id_book = $item['id_book'] ?? $item['id_book'] ?? null;
            $item['book'] = $id_book ? Book::find($id_book) : null;
            $fullOrderInfo[] = $item;
        }
        return $fullOrderInfo;
    }

    public static function delete()
    {
        list(, $id_user) = self::getTokenAndUserId();

        $id_order = $_GET['id_order'] ?? null;
        $id_book = $_GET['id_book'] ?? null;
        $price = (float) ($_GET['price']);
        $quantity = (int) ($_GET['quantity'] ?? 1);

        OrderItem::delete($id_order, $id_book);
        $itemTotal = $price * max(1, $quantity);
        OrderController::updateTotalPrice($id_order, -$itemTotal);

        $remaining = OrderItem::getOrderItemsByOrderId($id_order);
        if (empty($remaining)) {
            OrderController::delete($id_order);
        }

        $base = defined('BASE_URL') ? BASE_URL : '/';
        header('Location: ' . $base . 'index.php?c=Order&a=getFullOrderInfo&id_user=' . (int) $id_user);
        exit;
    }

    public static function updateQuantity()
    {
        // list(, $id_user) = self::getTokenAndUserId();

        $id_order = $_GET['id_order'];
        $id_book = $_GET['id_book'];
        $quantity = (int) ($_GET['quantity']);

        OrderItem::updateQuantity($id_order, $id_book, max(1, $quantity));
        OrderController::recalculateTotalFromItems($id_order);
        echo OrderController::getTotalPrice($id_order);
        // $base = defined('BASE_URL') ? BASE_URL : '/';
        // header('Location: ' . $base . 'index.php?c=Order&a=getFullOrderInfo&id_user=' . (int) $id_user);
        // exit;
    }
}
