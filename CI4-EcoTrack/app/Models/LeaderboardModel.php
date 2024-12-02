<?php namespace App\Models;

use CodeIgniter\Model;

class LeaderboardModel extends Model
{
    protected $table = 'Leaderboard';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['rank', 'user_name', 'current_points'];

    public function updateLeaderboard()
{
    try {
        $query = $this->db->query("DELETE FROM leaderboard;");
		
		        $query = $this->db->query("INSERT INTO leaderboard (user_id, username, current_points, rank)
		SELECT ug.user_id, ug.user_name AS username, ug.current_points, 
		ROW_NUMBER() OVER (ORDER BY ug.current_points DESC) AS rank
		FROM user_goals ug
		ORDER BY ug.current_points DESC
		LIMIT 10
		ON DUPLICATE KEY UPDATE
		username=VALUES(username),
		current_points=VALUES(current_points),
		rank = VALUES(rank);
        ");
        return true; 
    } catch (\Exception $e) {
        log_message('error', 'Error updating user goals: ' . $e->getMessage());
        return false;
    }
}
}
