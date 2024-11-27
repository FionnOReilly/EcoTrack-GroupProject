<?php namespace App\Models;


use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'users'; // Replace with your actual table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'username', 'created_at', 'updated_at'];
}
