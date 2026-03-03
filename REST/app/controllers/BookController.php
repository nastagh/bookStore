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

    public function delete($id) {
        $deleted = Book::delete($id);
        if (!$deleted) {
            http_response_code(404);
            echo json_encode(['message' => 'Book not found']);
        } else {
            http_response_code(200);
            echo json_encode(['message' => 'Book deleted']);
        }
    }

    public function update($id, $data) {
        $updated = Book::update($id, $data);
        if (!$updated) {
            http_response_code(404);
            echo json_encode(['message' => 'Book not found']);
        } else {
            http_response_code(200);
            echo json_encode(['message' => 'Book updated']);
        }
    }

}