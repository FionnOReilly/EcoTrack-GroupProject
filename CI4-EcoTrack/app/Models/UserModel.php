<?php namespace App\Models;


use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Your users table name
    protected $primaryKey = 'user_id'; // Primary key column

    protected $allowedFields = [
        'first_name', 'last_name', 'username', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true; // Enable timestamps if your table has created_at and updated_at


}