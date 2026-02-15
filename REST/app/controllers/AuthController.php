<?php

require_once __DIR__ ."/../../vendor/autoload.php";
require_once __DIR__ ."/../models/User.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController {
    
        public function login($data) {
        if (!isset($data['email']) || !isset($data['password'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Email and password required']);
            return;
        }

        // En este ejemplo, comprobamos contra la base de datos (si tu tabla tiene campo password)
        //    o simplemente una validación simulada para pruebas.
        $user = User::findByEmail($data['email']);
        if (!$user || $user['password'] !== $data['password']) {
            http_response_code(401);
            echo json_encode(['message' => 'Incorrect credentials']);
            return;
        }

        // Cargar configuración JWT
        $config = require __DIR__ . '/../config/jwt.php';
        $issuedAt = time();
        $expire = $issuedAt + $config['exp_time'];

        // Crear payload (contenido del token)
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expire,
            'user' => [
                'id' => $user['id'],
                'email' => $user['email']
            ]
        ];

        // Generar token
        $jwt = JWT::encode($payload, $config['secret_key'], $config['algorithm']);

        echo json_encode([
            'message' => 'Login correct',
            'token' => $jwt
        ]);
    }
}