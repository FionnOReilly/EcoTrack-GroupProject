<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel'; // Specify the model
    protected $format = 'json'; // Specify response format

    // Fetch all users
    public function index()
    {
        $users = $this->model->findAll();
        return $this->respond($users);
    }

    // Register a new user
    public function registerUser()
    {
        $data = $this->request->getJSON();

        if (!$data) {
            return $this->fail('Invalid request data.');
        }

        $inserted = $this->model->insert((array)$data);

        if ($inserted) {
            return $this->respondCreated(['message' => 'User registered successfully']);
        } else {
            return $this->fail('Failed to register user.');
        }
    }

    // Fetch a specific user by ID
    public function getUser($id)
    {
        $user = $this->model->find($id);

        if ($user) {
            return $this->respond($user);
        } else {
            return $this->failNotFound('User not found');
        }
    }
}
