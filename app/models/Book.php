<?php

require_once __DIR__ . '/../core/database.php';

class Book
{
    public static function find($id_book)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM books WHERE id_book = ?');
        $stmt->execute([$id_book]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }
}
