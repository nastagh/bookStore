<?php 

require_once __DIR__.'/../core/database.php';

class Book {
    public static function all() {
        $db = Database::connect();
        $stmt = $db->query('SELECT * FROM books');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public static function create($data) {
        $title = trim((string) $data['title']);
        $image = trim((string) $data['image']);
        $author = trim((string) $data['author']);
        $price = trim((string) $data['price']);
        $stock = trim((string) $data['stock']);
        $category = trim((string) $data['category']);

        try {
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO books (title, image, author, price, stock, id_categoria) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $image, $author, $price, $stock, $category]);
            $id = $db->lastInsertId();
            return $id ? self::find((int) $id) : null;
        } catch (Throwable $e) {
            return null;
        }
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM books WHERE id_book = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM books WHERE id_book = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE books SET stock = ? WHERE id_book = ?");
        $stmt->execute([$data['stock'], $id]);
        return $stmt->rowCount();
    }
}

?>