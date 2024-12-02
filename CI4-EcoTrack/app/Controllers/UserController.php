<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\UserModel;

class UserController extends ResourceController
{
    protected $userModel;

    protected $format = 'json';

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->findAll();
        return $this->respond($users);
    }

    public function registerUser()
    {
        $data = $this->request->getJSON();

        $userData = [
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'email' => $data->email,
            'password' => $data->password,
        ];

        $this->userModel->insert($userData);
    }
}