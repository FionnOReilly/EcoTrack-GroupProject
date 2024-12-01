<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class AdminController extends ResourceController
{
    protected $userModel;
    protected $format = 'json';

    // Constructor to initialize the UserModel
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Method to fetch and return all users
    public function viewAllUsers()
    {
        // Fetch all users from the database
        $users = $this->userModel->findAll();

        // Check if users are found
        if (empty($users)) {
            return $this->failNotFound('No users found');
        }

        // Return the list of users as a JSON response
        return $this->respond($users);
    }

    
public function updateUser($id)
{
    $db = \Config\Database::connect();
    $input = $this->request->getJSON();

    if (!$input) {
        return $this->failValidationErrors('Invalid input');
    }

    $builder = $db->table('users');
    $updateData = [
        'first_name' => $input->first_name ?? null,
        'last_name' => $input->last_name ?? null,
        'email' => $input->email ?? null,
    ];

    $builder->where('id', $id);
    $result = $builder->update($updateData);

    if ($result) {
        return $this->respondUpdated(['message' => 'User updated successfully']);
    } else {
        return $this->fail('Failed to update user');
    }
}


    public function deleteUser($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query('CALL DeleteUserById(?)', [$id]);
        $result = $query->getRow();
    
        if ($result) {
            return $this->respondDeleted(['message' => $result->message]);
        } else {
            return $this->failNotFound('User not found or could not be deleted');
        }
    }
    
    
    
}