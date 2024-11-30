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

public function registerUser() { $data = $this->request->getJSON(); // Ensure the data keys match the expected field names 
$userData = [ 'first_name' => $data->first_name,
 'last_name' => $data->last_name, 'email' => 
$data->email, 'password' => $data->password ]; if ($this->model->insertUser($userData)) { return $this->
respond(['status' => 'success', 'message' => 'Registration successful']); }
 else { return $this->respond(['status' => 'error', 'message' =>
 'Registration failed'], 500); } 
 }
}
