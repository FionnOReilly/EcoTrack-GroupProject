<?php

namespace App\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthenticationController extends BaseController
{
    private $secretKey = 'your-secret-key'; // Replace with your actual secret key

    public function login()
    {
        $data = $this->request->getJSON();

        $email = $data->email ?? '';
        $password = $data->password ?? '';

        $db = \Config\Database::connect();
        $query = $db->query('CALL ValidateUser(?, ?)', [$email, $password]);
        $user = $query->getRow();

        if ($user) {
            // Generate a token 
            $token = JWT::encode([
                'id' => $user->id,
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'role' => $user->role
            ], $this->secretKey, 'HS256');

            // Prepare the user data
            $userData = [
                'id' => $user->id,
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'role' => $user->role
            ];

            // Return the JSON response with user data
            return $this->response->setJSON([
                'status' => 'success',
                'token' => $token,
                'user' => $userData,
            ]);
        } else {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    }

    public function validateToken($token)
    {
        try {
            $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));
            return (array) $decoded;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function dashboardPage()
    {
        // Check if the user is authenticated using the token
        $token = $this->request->getHeader('Authorization') ? $this->request->getHeader('Authorization')->getValue() : null;
        $token = str_replace('Bearer ', '', $token);
        $userData = $this->validateToken($token);

        if ($userData) {
            // User is authenticated, fetch the waste logs
            $userID = $userData['id']; // Get user ID from validated token
            $wasteLogModel = new \App\Models\WasteLogModel();
            $wasteLogs = $wasteLogModel->where('user_id', $userID)->findAll();

            return $this->response->setJSON([
                'status' => 'success',
                'data' => $wasteLogs,
            ]);
        } else {
            // Unauthorized access
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        }
    }

    public function adminLogin() {
        $data = $this->request->getJSON();
        $email = $data->email ?? '';
        $password = $data->password ?? '';

        $db = \Config\Database::connect();
        $query = $db->query('CALL ValidateUser(?, ?)', [$email, $password]);
        $user = $query->getRow();

        if ($user && $user->role === 'admin') {
            // Generate a token 
            $token = JWT::encode([
                'id' => $user->id,
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'role' => $user->role
            ], $this->secretKey, 'HS256');

            // Prepare the user data
            $userData = [
                'id' => $user->id,
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'role' => $user->role
            ];

            // Return the JSON response with the token and user data
            return $this->response->setJSON([
                'status' => 'success',
                'token' => $token,
                'user' => $userData,
            ]);
        } else {
            return $this->response->setStatusCode(401)->setJSON([
                'status' => 'error',
                'message' => 'Invalid credentials or not an admin'
            ]);
        }
    }
}
