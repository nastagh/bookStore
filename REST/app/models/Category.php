<?php


require_once __DIR__ . '/../core/database.php';

class Category
{
    public static function all()
    {
        $db = Database::connect();
        $stmt = $db->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}