<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins'; // Table name
    protected $primaryKey = 'id'; // Primary key
    protected $allowedFields = [
        'f_name', 'l_name', 'email', 'password'
    ];

    // Validation rules
    protected $validationRules = [
        'f_name' => 'required|min_length[3]|max_length[50]',
        'l_name' => 'required|min_length[3]|max_length[50]',
        'email' => 'required|valid_email|is_unique[admins.email]',
        'password' => 'required|min_length[8]'
    ];

    // Method to insert a new Admin user using the stored procedure
    public function insertAdmin($data)
    {
        $first_name = $data['FullName'];
        $last_name = $data['FullName'];
        $email = $data['Email'];
        $password = $data['Password'];

        // Call the stored procedure to insert the new admin
        $insertAdminQuery = "CALL insertAdmin(?, ?, ?)";
        return $this->db->query($insertAdminQuery, [$first_name,$last_name, $email, $password]);
    }

    // Method to update an existing Admin user using the stored procedure
    public function updateAdmin($admin_id, $data)
    {
        $f_name = $data['f_name'];
        $l_name = $data['l_name'];
        $email = $data['email'];
        $password = $data['password'];

        // Call the stored procedure to update the admin
        $updateAdminQuery = "CALL updateAdmin(?, ?, ?, ?, ?, ?)";
        return $this->db->query($updateAdminQuery, [$admin_id, $f_name, $l_name, $email, $password]);
    }

    // Method to delete an Admin user using the stored procedure
    public function deleteAdmin($admin_id)
    {
        // Call the stored procedure to delete the admin by ID
        $deleteAdminQuery = "CALL deleteAdmin(?)";
        return $this->db->query($deleteAdminQuery, [$admin_id]);
    }

    // Method to delete a user (calls deleteAdmin)
    public function deleteUser($id)
    {
        return $this->deleteAdmin($id);  // Correctly calling deleteAdmin method
    }
}

?>