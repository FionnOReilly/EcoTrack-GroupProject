<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // params
    protected $table = 'users'; // Table name
    protected $primaryKey = 'user_id'; // Primary key
    protected $allowedFields = ['username', 'first_name', 'last_name', 'email', 'password']; // Accessible fields
    
// Function to get user by email
public function getUserByEmail($email)
{
    return $this->where('email', $email)->first();
}
    public function login()
    {
        // Get user input (email and password)
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Validate input
        if (!$email || !$password) {
            return $this->respond(['message' => 'Please provide both email and password.'], 400);
        }

        // Instantiate the UserModel to interact with the database
        $userModel = new UserModel();

        // Fetch user by email
        $user = $userModel->getUserByEmail($email);

        // If user does not exist, return an error message
        if (!$user) {
            return $this->respond(['message' => 'Invalid email or password.'], 401);
        }

        // Verify password (password should be hashed in the database)
        if (password_verify($password, $user['password'])) {
            // User authenticated successfully, generate a token (if required)
            // For now, let's just send a success message
            return $this->respond([
                'message' => 'Login successful',
                'user' => $user, // Send user data or token here
            ]);
        } else {
            // Password is incorrect
            return $this->respond(['message' => 'Invalid email or password.'], 401);
        }
    }
}
