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

    public function deleteUser($user_id)
    {
        // Check if the user exists
       // For deleting a user by id
        $user = $this->userModel->where('id', $user_id)->delete();

        if (!$user) {
            log_message('error', 'User not found with ID: ' . $user_id);  // Debug log
            return $this->failNotFound('User not found');
        }
    
        // Try to delete the user
        if ($this->userModel->delete($user_id)) {
            log_message('info', 'User deleted successfully with ID: ' . $user_id);  // Debug log
            return $this->respondDeleted(['message' => 'User deleted successfully']);
        } else {
            log_message('error', 'Failed to delete user with ID: ' . $user_id);  // Debug log
            return $this->failServerError('Failed to delete user');
        }
    }
    
    
}
