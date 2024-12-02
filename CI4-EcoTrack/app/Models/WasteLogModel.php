<?php namespace App\Models;

use CodeIgniter\Model;

class WasteLogModel extends Model
{
    protected $table = 'waste_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['waste_type', 'bag_size', 'is_recyclable', 'date_of_disposal', 'user_id'];
   
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function insertWasteLog($wasteLog)
    {
        $wasteType = $wasteLog['type'];
        $bagSize = $wasteLog['size'];
        $isRecyclable = $wasteLog['recyclable'];
        $dateOfDisposal = $wasteLog['date'];
        $user_id = $wasteLog['user_id'];    
        $insertWasteLog = "CALL insert_waste_log('$wasteType', '$bagSize', '$isRecyclable', '$dateOfDisposal', '$user_id')";

         $this->db->query($insertWasteLog);
}


}
