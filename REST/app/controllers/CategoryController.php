<?php


require_once __DIR__ . "/../models/Category.php";

class CategoryController
{
    public function index()
    {
        echo json_encode(Category::all());
    }

}