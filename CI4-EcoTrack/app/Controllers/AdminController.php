<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\AdminModel'; // Specify what model this controller uses
    protected $format = 'json'; // Specify format


    public function index(){

        // Retrieve all users from the database, you may also call stored procedures here
        $admins = $this->model->findAll();
        // // Return the list using the respond function
        return $this->respond($admins);
    }
    public function insertAdmin($data)
    {
        $data = $this->request->getJSON();
    
        $this->model->insertAdmin((array)$data);
    
    }

    // Method to delete an Admin user (soft delete) using the stored procedure
    public function deleteAdmin($adminId)
    {
       
    }
}