<?php namespace App\Models;

use CodeIgniter\Model;

class WasteLogModel extends Model
{
    protected $table = 'waste_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['waste_type', 'bag_size', 'is_recyclable', 'date_of_disposal'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function insertWasteLog($wasteLog)
    {
        $wasteType = $wasteLog['type'];
        $bagSize = $wasteLog['size'];
        $isRecyclable = $wasteLog['recyclable'];
        $dateOfDisposal = $wasteLog['date'];
    
        $insertWasteLog = "CALL insert_waste_log('$wasteType', '$bagSize', '$isRecyclable', '$dateOfDisposal')";

         $this->db->query($insertWasteLog);
}
}