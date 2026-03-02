<?php


require_once __DIR__ . "/../models/Book.php";

class BookController
{
    public function index()
    {
        echo json_encode(Book::all());
    }

    public function create($data) {
        $book = Book::create($data);
        if (!$book) {
            http_response_code(400);
            echo json_encode(['message' => 'Book not created']);
        } else {
            http_response_code(201);
            echo json_encode($book);
        }
    }


}