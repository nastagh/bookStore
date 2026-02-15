<?php

require_once __DIR__ . "/../controllers/BookController.php";
require_once __DIR__ . "/../controllers/CategoryController.php";
require_once __DIR__ . "/../controllers/UserController.php";

// Define the Router class that will be responsible for analyzing the URL and the HTTP method.
class Router
{
    private $controllerB;
    private $controllerC;
    private $controllerU;

    // Receive:
    //     $method → GET, POST, PUT, DELETE
    //     $uri → clean route (books o books/1)
    //     $data → body data POST/PUT (array PHP)

    public function __construct()
    {
        $this->controllerB = new BookController();
        $this->controllerC = new CategoryController();
        $this->controllerU = new UserController();
    }

    public function route($method, $uri, $data = null)
    {
        $parts = explode("/", trim($uri, "/"));
        if ($parts[0] == 'books') {
            $id = $parts[1] ?? null;
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerB->show($id) : $this->controllerB->index();
                    break;
            }
        } elseif ($parts[0] == 'categories') {
            switch ($method) {
                case 'GET':
                    $this->controllerC->index();
                    break;
            }
        } elseif (($parts[0] == 'login' && $method == 'POST') || $parts[0] == 'users') {
            $id = $parts[1] ?? null;
            if ($parts[0] == 'login' && $method == 'POST') {
                $auth = new AuthController();
                $auth->login($data);
                return;
            }
            AuthMiddleware::verificarToken();
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerU->show($id) : $this->controllerU->index();
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['message' => 'Method not allowed']);
            }

        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Route doesnt found']);
            return;
        }
    }
}


/* Router.php is like the API's control center: Receives the URL and HTTP method from index.php Cleans and separates the route (users, users/1) Decides which controller action to execute Returns the JSON response to the user index.php → input Router.php → routes the request Controller → handles the logic Model → accesses the database */