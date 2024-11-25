<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // params
    protected $table = 'users'; // Table name
    protected $primaryKey = 'user_id'; // primary key
    protected $allowedFields = ['username', 'first_name', 'last_name','role']; // Accessible fields
    
	public function getUserByEmail($email) { return $this->asArray() ->where(['email' => $email]) ->first(); }
}