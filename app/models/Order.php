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

    /** Add $amount to the order's total_price (pass negative to subtract) */
    public static function updateTotalPrice($id_order, $amount) {
        $db = Database::connect();
        $stmt = $db->prepare('UPDATE orders SET total_price = total_price + ? WHERE id_order = ?');
        $stmt->execute([$amount, $id_order]);
        return $stmt->rowCount();
    }

    /** Recalculate order total from its items (quantity * price per item) and update the order. */
    public static function recalculateTotalFromItems($id_order) {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT quantity, price FROM order_items WHERE id_order = ?');
        $stmt->execute([$id_order]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total = 0;
        foreach ($rows as $row) {
            $total += (float) $row['quantity'] * (float) $row['price'];
        }
        $stmt = $db->prepare('UPDATE orders SET total_price = ? WHERE id_order = ?');
        $stmt->execute([$total, $id_order]);
        return $stmt->rowCount();
    }

    public static function getTotalPrice($id_order) {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT total_price FROM orders WHERE id_order = ?');
        $stmt->execute([$id_order]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_price'];
    }
    /** Delete an order by id (e.g. when it has no items left) */
    public static function delete($id_order) {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM orders WHERE id_order = ?');
        $stmt->execute([$id_order]);
        return $stmt->rowCount();
    }
}
?>