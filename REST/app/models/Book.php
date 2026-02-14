<?php 

require_once __DIR__.'/../core/database.php';

class Book {
    public static function all() {
        $db = Database::connect();
        $stmt = $db->query('SELECT * FROM books');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 



}

?>