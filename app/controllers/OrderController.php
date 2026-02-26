<?php

require_once __DIR__ . '/../models/Order.php';

class OrderController
{
    public static function create($id_user,$created_at, $total_price)
    {
        return Order::create($id_user, $created_at, $total_price);
    }

    public static function getOrdersByUserId() {
        $id_user = $_GET['id_user'] ?? null;
        $orders = Order::getOrdersByUserId($id_user);
        require __DIR__ . '/../views/layout/orders.php';
    }
}