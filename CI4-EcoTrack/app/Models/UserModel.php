<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password'];

    public function insertUser($data)
    {
        // Ensure the keys are correct
        $db = \Config\Database::connect();
        $query = $db->query('CALL InsertUser(?, ?, ?, ?)', [
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password']
        ]);

        return $query !== false;
    }
}
