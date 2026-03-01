
<?php

require_once __DIR__ . '/../core/database.php';

class OrderItem {
    public static function all() {
        $db = Database::connect();
        $stmt = $db->query('SELECT * FROM order_items');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($id_order, $id_book, $quantity, $price) {
        $db = Database::connect();
        $stmt = $db->prepare('INSERT INTO order_items VALUES (?,?,?,?)');
        $stmt->execute([$id_order, $id_book, $quantity, $price]);
    }
    public static function getOrderItemsByOrderId($id_order) {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM order_items WHERE id_order = ?');
        $stmt->execute([$id_order]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Delete a single line: one row with this id_order + id_book */
    public static function delete($id_order, $id_book) {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM order_items WHERE id_order = ? AND id_book = ? LIMIT 1');
        $stmt->execute([$id_order, $id_book]);
        return $stmt->rowCount();
    }

    public static function updateQuantity($id_order, $id_book, $quantity) {
        $db = Database::connect();
        $stmt = $db->prepare('UPDATE order_items SET quantity = ? WHERE id_order = ? AND id_book = ? LIMIT 1');
        $stmt->execute([$quantity, $id_order, $id_book]);
        return $stmt->rowCount();
    }
    public static function getOrderItemByOrderIdAndBookId($id_order, $id_book) {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM order_items WHERE id_order = ? AND id_book = ?');
        $stmt->execute([$id_order, $id_book]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
