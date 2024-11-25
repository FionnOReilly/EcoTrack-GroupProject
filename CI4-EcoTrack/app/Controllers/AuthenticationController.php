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

            // Store token in session or database
            return $this->response->setJSON([
                'status' => 'success',
                'token' => $token,
                'user' => $user,
            ]);
        } else {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    }
}
