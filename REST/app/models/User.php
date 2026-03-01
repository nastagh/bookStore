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
        $id = (int) $id;
        $stmt = $db->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create($data) {
        $name = trim((string) $data['name']);
        $email = trim((string)$data['email']);
        $password = $data['password'];

        try {
            $db = Database::connect();
            $idRole = ($data['name'] === 'admin') ? 1 : 2;
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO users (name, email, password, id_role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $passwordHash, $idRole]);
            $id = $db->lastInsertId();
            return $id ? self::find((int) $id) : null;
        } catch (Throwable $e) {
            return null;
        }
    }
}