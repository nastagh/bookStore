<?php

require_once __DIR__ . '/../models/OrderItem.php';
require_once __DIR__ . '/OrderController.php';

class OrderItemController
{
    public static function create()
    {
        $id_book = $_GET['id_book'];
        $quantity = $_GET['quantity'];
        $price = $_GET['price'];

        // $id_order = OrderController::create($_SESSION['id_user'], date('Y-m-d H:i:s'), $price);
        $id_order = OrderController::create(1, date('Y-m-d H:i:s'), $price);

        OrderItem::create($id_order, $id_book, $quantity, $price);

        // Redirect back to home
        header("Location: index.php");
        exit();
    }
}