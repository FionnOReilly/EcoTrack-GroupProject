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
        // Execute the stored procedure to insert the new admin
        $sql = "CALL InsertAdmin(:f_name:, :l_name:, :username:, :email:, :password_hash:)";
        $query = $this->db->query($sql, [
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password_hash' => $data['password_hash']
        ]);

        return $query;
    }

    // Method to delete an Admin user (soft delete) using the stored procedure
    public function deleteAdmin($adminId)
    {
        // Execute the stored procedure for soft delete
        $sql = "CALL DeleteAdmin(:admin_id:)";
        $query = $this->db->query($sql, ['admin_id' => $adminId]);

        return $query;
    }
}