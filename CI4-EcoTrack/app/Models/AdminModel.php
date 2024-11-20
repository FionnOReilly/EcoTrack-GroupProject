
<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins'; // Table name
    protected $primaryKey = 'admin_id'; // primary key
    // Define allowed fields for insertion or updating
    protected $allowedFields = [
        'f_name', 'l_name', 'username', 'email', 'password_hash'
    ];

    // Validation rules for incoming data (optional but useful for data integrity)
    protected $validationRules = [
        'f_name' => 'required|min_length[3]|max_length[50]',
        'l_name' => 'required|min_length[3]|max_length[50]',
        'username' => 'required|is_unique[admins.username]|min_length[5]|max_length[50]',
        'email' => 'required|valid_email|is_unique[admins.email]',
        'password_hash' => 'required|min_length[8]'
    ];

    // Method to insert a new Admin user using the stored procedure
    public function insertAdmin($data)
    {
        // Execute the stored procedure to insert the new admin
        $sql = "CALL InsertAdmin(:f_name:, :l_name:, :username:, :email:, :password_hash:)";
        $query = $this->db->query($sql, [
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password_hash' => $data['password_hash']
        ]);

        return $query;
    }

    // Method to delete an Admin user (soft delete) using the stored procedure
    public function deleteAdmin($adminId)
    {
        // Execute the stored procedure for soft delete
        $sql = "CALL DeleteAdmin(:admin_id:)";
        $query = $this->db->query($sql, ['admin_id' => $adminId]);

        return $query;
    }

    // Method to retrieve all active admins (not deleted)
    public function getAllAdmins()
    {
        return $this->where('deleted_at', null)->findAll();  // Fetch all active admins
    }
}
?>