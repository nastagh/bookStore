<?php

require_once __DIR__ . "/../models/User.php";

class UserController
{

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            http_response_code(404);
            echo json_encode(['mensage' => 'User not found']);
        } else {
            echo json_encode($user);
        }
    }
    
    public function create($data)
    {
        if (!is_array($data) || empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Name, email and password are required']);
            return;
        }
        $user = User::create($data);
        if (!$user) {
            http_response_code(400);
            echo json_encode(['message' => 'User not created']);
        } else {
            http_response_code(201);
            echo json_encode($user);
        }
    }
}