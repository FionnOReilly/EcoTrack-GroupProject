<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\WasteLogModel;

class WasteLogController extends ResourceController
{
    protected $wasteLogModel;

    public function __construct()
    {
        $this->wasteLogModel = new WasteLogModel();
    }

    public function index()
    {
        $wasteLogs = $this->wasteLogModel->findAll();
        return $this->respond($wasteLogs);
    }

    public function addWasteLog()
    {
        $wasteData = $this->request->getJSON();

        $wasteLog = [
            'waste_type' => $wasteData->type,
            'bag_size' => $wasteData->size,
            'is_recyclable' => $wasteData->recyclable,
            'date_of_disposal' => $wasteData->date,
            'user_id' => $wasteData->user_id,
        ];

        $this->wasteLogModel->insert($wasteLog);
    }

    public function getUserWasteLogs($userId)
    {
        $wasteLogs = $this->wasteLogModel->where('user_id', $userId)->findAll();
        return $this->respond($wasteLogs);
    }

    public function deleteWasteLog($id)
    {
        $this->wasteLogModel->find($id);
        $this->wasteLogModel->delete($id);
    }
}
