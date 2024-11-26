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
        // Call stored procedure to soft delete admin (mark as deleted)
        $result = $this->model->softDeleteAdmin($adminId);
    
        if ($result) {
            return $this->respond(['message' => 'Admin deleted successfully.'], 200);
        } else {
            return $this->respond(['message' => 'Failed to delete admin.'], 500);
        }
    }
            // Method to update an Admin user
        public function updateAdmin($adminId)
        {
    $data = $this->request->getJSON();  // Get the new data (typically from the request body)
    
    // Validate the data before processing (optional)
    if (empty($data->name) || empty($data->email)) {
        return $this->respond(['message' => 'Name and Email are required.'], 400);
    }

    // Call the stored procedure to update the admin
    $result = $this->model->updateAdmin((int)$adminId, (array)$data);

    if ($result) {
        return $this->respond(['message' => 'Admin updated successfully.'], 200);
    } else {
        return $this->respond(['message' => 'Failed to update admin.'], 500);
    }
}
public function updateAdmin($adminId)
{
    // Sample updated data for the admin
    $data = [
        'f_name' => 'John Updated',
        'l_name' => 'Doe Updated',
        'username' => 'johndoe_updated',
        'email' => 'john_updated@example.com',
        'password_hash' => 'newpassword123'
    ];

    // Call the updateAdmin method from the model
    $this->adminModel->updateAdmin($adminId, $data);

    return "Admin updated successfully.";
}

// Test deleting an admin (soft delete)
public function deleteAdmin($adminId)
{
    // Call the deleteAdmin method from the model
    $this->adminModel->deleteAdmin($adminId);

    return "Admin soft deleted successfully.";
}
}
