<?php


require_once __DIR__ . "/../models/Category.php";

class CategoryController
{
    public function index()
    {
        echo json_encode(Category::all());
    }

    public function show($id) {
        $category = Category::find($id);
        if (!$category) {
            http_response_code(404);
            echo json_encode(['message' => 'Category not found']);
        } else {
            echo json_encode($category);
        }
    }

    public function create($data) {
        $name = null;
        if (is_array($data) && isset($data['name'])) {
            $name = trim((string) $data['name']);
        }
        $category = Category::create(['name' => $name]);
        if (!$category) {
            http_response_code(400);
            echo json_encode(['message' => 'Category not created']);
        } else {
            http_response_code(201);
            echo json_encode($category);
        }
    }


    public function update($id, $data) {
        $category = Category::update($id, $data);
        if(!$category) {
            http_response_code(404);
            echo json_encode(['message' => 'Category not found']);
        } else {
            echo json_encode($category);
        }
    }

    public function delete($id) {
        $deleted = Category::delete($id);
        if (!$deleted) {
            http_response_code(404);
            echo json_encode(['message' => 'Category not found']);
        } else {
            http_response_code(200);
            echo json_encode(['message' => 'Category deleted']);
        }
    }


}