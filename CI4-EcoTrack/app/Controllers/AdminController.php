<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;  // Import the UserModel

class AdminController extends ResourceController
{
    protected $userModel;
    protected $format = 'json';

    public function __construct()
    {
        // Initialize the UserModel
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
}
