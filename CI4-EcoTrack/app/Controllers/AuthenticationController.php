<?php

namespace App\Controllers;

class AuthenticationController extends BaseController
{
    public function login()
    {
        $data = $this->request->getJSON();

        $email = $data->email ?? '';
        $password = $data->password ?? '';

        $db = \Config\Database::connect();
        $query = $db->query('CALL ValidateUser(?, ?)', [$email, $password]);
        $user = $query->getRow();

        if ($user) {
            // Generate a token (simple example)
            $token = base64_encode(random_bytes(32));

            // Prepare the user data with first_name and last_name
            $userData = [
                'user_id' => $user->user_id,
                'username' => $user->username,
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
				'role' => $user->role
            ];

            // Store token in session or database if needed

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
	
public function adminLogin() {
    $data = $this->request->getJSON();
    $email = $data->email ?? '';
    $password = $data->password ?? '';

    $db = \Config\Database::connect();
    $query = $db->query('CALL ValidateUser(?, ?)', [$email, $password]);
    $user = $query->getRow();

    if ($user && $user->role === 'admin') {
        // Generate a token (simple example)
        $token = base64_encode(random_bytes(32));

        // Prepare the user data with first_name, last_name, and role
        $userData = [
            'user_id' => $user->user_id,
            'username' => $user->username,
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

