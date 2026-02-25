<?php


require_once __DIR__ ."/../core/database.php";

class User {
    
    public static function findByEmail($email) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function create($data) {
        $db = Database::connect();
        $idRole = ($data['name'] === 'admin') ? 1 : 2;
        // Default id_role = 2 (user) if not provided
        // $idRole = isset($data['id_role']) ? (int) $data['id_role'] : 2;
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (name, email, password, id_role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['email'], $passwordHash, $idRole]);
        $id = $db->lastInsertId();
        return $id ? self::find((int) $id) : null;
    }
}