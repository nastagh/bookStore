<?php


require_once __DIR__ . '/../core/database.php';

class Category
{
    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id_categoria = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function all()
    {
        $db = Database::connect();
        $stmt = $db->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $name = is_array($data) ? trim((string) ($data['name'] ?? '')) : trim((string) $data);
        if ($name === '') {
            return null;
        }
        try {
            $db = Database::connect();
            $stmt = $db->prepare('INSERT INTO categories (name) VALUES (?)');
            $stmt->execute([$name]);
            $id = $db->lastInsertId();
            return $id ? self::find((int) $id) : null;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE categories SET name = ? WHERE id_categoria = ?");
        $stmt->execute([$data['name'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM categories WHERE id_categoria = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

}