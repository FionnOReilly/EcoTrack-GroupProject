<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins'; // Table name
    protected $primaryKey = 'admin_id'; // primary key
    // Define allowed fields for insertion or updating
    protected $allowedFields = [
        'f_name', 'email', 'password_hash'
    ];

    // Validation rules for incoming data (optional but useful for data integrity)
    protected $validationRules = [
        'f_name' => 'required|min_length[3]|max_length[50]',
        'l_name' => 'required|min_length[3]|max_length[50]',
        'username' => 'required|min_length[8]',
        'email' => 'required|valid_email|is_unique[admins.email]',
        'password_hash' => 'required|min_length[8]'
    ];

    // Method to insert a new Admin user using the stored procedure
    public function insertAdmin($data)
    {
        $f_name = $data['FullName'];
        $email = $data['Email'];
        $password = $data['Password'];

        $insertAdmin = "CALL insertAdmin('$f_name', '$email', '$password')";

        // Execute the stored procedure to insert the new admin
        // $query = $this->db->query( [
        //     'f_name' => $data['f_name'],
        //     'l_name' => $data['l_name'],
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'password_hash' => $data['password_hash']
        // ]);

        $this->db->query($insertAdmin);
    }

//   public function updateAdmin($data){
//     $f_name = $data[""];
//     $email = $data[""];
//     $password = $data[""];
//     $updateAdmin = portal_update_admin($data);

//   }
    // public function deleteAdmin($admin_id){
    //     $this->db->query("CALL deleteAdmin()");
    // }
}

?>