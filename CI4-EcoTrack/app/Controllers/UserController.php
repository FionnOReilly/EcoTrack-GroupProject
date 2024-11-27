<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel'; // Specify what model this controller uses
    protected $format = 'json'; // Specify format

    public function index(){

        // Retrieve all users from the database, you may also call stored procedures here
        $users = $this->model->findAll();
        // Return the list using the respond function
        return $this->respond($users);
    }

    public function registerUser()
    {
        $data = $this->request->getJSON();

        $this->model->InsertUser((array)$data);

    }
}