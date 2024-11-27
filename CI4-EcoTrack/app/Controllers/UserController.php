<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel'; // Specify what model this controller uses
    protected $format = 'json'; // Specify format


    public function index(){

        // Retrieve all users from the database, you may also call stored procedures here
        $users = $this->model->findAll();
        // // Return the list using the respond function
        return $this->respond($users);
    }
    public function deleteUser($user_id)
    {
        if ($this->userModel->delete($user_id)) {
            return $this->respondDeleted(['message' => 'User deleted successfully']);
        } else {
            return $this->failNotFound('User not found');
        }
    }
}