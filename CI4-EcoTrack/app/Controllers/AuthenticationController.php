<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthenticationController extends BaseController
{
	
	public function index()
{
	
    return $this->response->setJSON(['message' => 'Default route is working']);
	
}

public function test()
{
    return $this->response->setJSON(['message' => 'Connection successful']);
}

    public function login()
    {
        helper(['form', 'url']);
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        log_message('debug', "Attempting login with email: $email and password: $password");


        $data = $model->getUserByEmail($email);
        if ($data) {
            if ($password == $data['password']) { // Direct comparison without hashing
                log_message('debug', "Login successful for email: $email");

                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'role' => $data['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);

                return $this->response->setJSON(['message' => 'Login successful']);
            } else {
                log_message('debug', "Wrong password for email: $email");
                return $this->response->setJSON(['error' => 'Wrong Password'], 401);
            }
        } else {
            log_message('debug', "Email not found: $email");
            return $this->response->setJSON(['error' => 'Email not found'], 404);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return $this->response->setJSON(['message' => 'Logout successful']);
    }
}
