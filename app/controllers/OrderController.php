<?php

require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../controllers/OrderItemController.php';

class OrderController
{
    public static function create($id_user,$created_at, $total_price)
    {
        return Order::create($id_user, $created_at, $total_price);
    }

    public static function getOrdersByUserId() {
        $id_user = $_GET['id_user'] ?? null;
        $orders = Order::getOrdersByUserId($id_user);
        return $orders;
    }
    
    public static function getLatestOrderByUserId($id_user) {
        return Order::getLatestOrderByUserId($id_user);
    }
    
    public static function updateTotalPrice($id_order, $total_price) {
        return Order::updateTotalPrice($id_order, $total_price);
    }
    
    public static function getFullOrderInfo() {
        $id_user = $_GET['id_user'] ?? null;

        $orders = self::getOrdersByUserId($id_user);
        $ordersWithItems = [];
        foreach ($orders as $order) {
            $id_order = $order['id_order'];
            $ordersWithItems[] = [
                'order' => $order,
                'items' => OrderItemController::getFullOrderInfo($id_order)
            ];
        }
        require __DIR__ . '/../views/layout/orders.php';
    }

}