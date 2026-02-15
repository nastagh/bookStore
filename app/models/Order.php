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
}
?>