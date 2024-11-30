<?php namespace App\Models;

use CodeIgniter\Model;

class UserGoalsModel extends Model
{
    protected $table = 'user_goals';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id', 'user_name', 'current_points'];

    public function updateUserGoalsWithPoints()
{
    try {
        $query = $this->db->query("
             INSERT INTO user_goals (user_id, user_name, current_points)
            SELECT u.id AS user_id, 
                   CONCAT(u.first_name, ' ', u.last_name) AS user_name,
                   COUNT(w.id) AS current_points
            FROM users u 
            LEFT JOIN waste_logs w ON u.id = w.user_id
            GROUP BY u.id
            ON DUPLICATE KEY UPDATE current_points = VALUES(current_points);
        ");
        return true; 
    } catch (\Exception $e) {
        log_message('error', 'Error updating user goals: ' . $e->getMessage());
        return false;
    }
}
}
