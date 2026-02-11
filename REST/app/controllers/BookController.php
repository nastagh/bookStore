<?php 

require_once __DIR__ ."/../models/Book.php";

class BookController {
    public function index() {
        echo json_encode(Book::all());
    } 

    public function show($id) {
        
    }

}



?>