<?php

require_once __DIR__ . '/../core/database.php';

class Order {
    public static function all() {
        $db = Database::connect();
        $stmt = $db->query('SELECT * FROM orders');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create($id_user,$created_at, $total_price) {
        $db = Database::connect();
        $stmt = $db->prepare('INSERT INTO orders VALUES (NULL, ?,?,?)');
        $stmt->execute([$id_user, $created_at, $total_price]);
        return $db->lastInsertId();
    }


    public static function getOrdersByUserId($id_user) {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM orders WHERE id_user = ?');
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getLatestOrderByUserId($id_user) {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM orders WHERE id_user = ? ORDER BY id_order DESC LIMIT 1');
        $stmt->execute([$id_user]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /** Add $amount to the order's total_price */
    public static function updateTotalPrice($id_order, $amount) {
        $db = Database::connect();
        $stmt = $db->prepare('UPDATE orders SET total_price = total_price + ? WHERE id_order = ?');
        $stmt->execute([$amount, $id_order]);
        return $stmt->rowCount();
    }
}
?>