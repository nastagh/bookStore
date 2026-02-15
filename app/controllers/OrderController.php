<?php

require_once __DIR__ . '/../models/Order.php';

class OrderController
{
    public static function create($id_user,$created_at, $total_price)
    {
        return Order::create($id_user, $created_at, $total_price);
    }
}