<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // params
    protected $table = 'users'; // Table name
    protected $primaryKey = 'user_id'; // primary key
    protected $allowedFields = ['username', 'first_name', 'last_name'];// Accessible fields
    



    public function login($email, $password){
        $this->db->query("Call loginValidation(?,?,@p_user_id)",[$email,$password]);

        $query= $this->db->query("SELECT @p_user_id as user_id",[$email,$password]);

        log_message("debug","returned from UserModel::login". print_r($query->getRow(),true) );

        return $query->getRow();

    }
}