<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password'];

    public function InsertUser($user)
    {
        $firstName = $user['firstName'];
        $lastName = $user['lastName'];
        $email = $user['email'];
        $password = $user['password'];

        $registerUser = "CALL InsertUser('$firstName', '$lastName', '$email', '$password')";

        $this->db->query($registerUser);

    }
}
