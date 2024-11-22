<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // params
    protected $table = 'users'; // Table name
    protected $primaryKey = 'id'; // primary key
    protected $allowedFields = [ 'firstName', 'lastName', 'email', 'password']; // Accessible fields


    public function InsertUser($wasteLog)
    {
        $firstName = $wasteLog['firstName'];
        $lastName = $wasteLog['lastName'];
        $email = $wasteLog['email'];
        $password = $wasteLog['password'];

        $registerUser = "CALL InsertUser('$firstName', '$lastName', '$email', '$password')";

        $this->db->query($registerUser);

    }
}