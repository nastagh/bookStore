<?php

require_once __DIR__ ."/../controllers/BookController.php";

// Define the Router class that will be responsible for analyzing the URL and the HTTP method.
class Router {
    private $controller;


    // Receive:
    //     $method → GET, POST, PUT, DELETE
    //     $uri → clean route (books o books/1)
    //     $data → body data POST/PUT (array PHP)
    
    public function __construct() {
        $this->controller = new BookController();
    }

    public function route($method, $uri, $data=null){
        $parts = explode("/", trim($uri,"/"));
        if($parts[0] != 'books') {
            http_response_code(404);
            echo json_encode(['message'=>'Route doesnt found']);
            return;
        }

        $id = $parts[1] ?? null;

        switch($method) {
            case 'GET':
                $id ? $this->controller->show($id) : $this->controller->index();
                break;
        }
    }
}


/*
Router.php is like the API's control center:
Receives the URL and HTTP method from index.php
Cleans and separates the route (users, users/1)
Decides which controller action to execute
Returns the JSON response to the user
index.php → input
Router.php → routes the request
Controller → handles the logic
Model → accesses the database
*/

?>