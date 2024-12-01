<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\WasteLogModel;

class WasteLogController extends ResourceController
{
    protected $modelName = 'App\Models\WasteLogModel';
    protected $format = 'json'; 
    
    public function index() {
        $wastelogs = $this->model->findAll();
        return $this->respond($wastelogs);
    }

    public function addWasteLog() {
        $data = $this->request->getJSON();

        if (!$data) {
            return $this->respond(['status' => 'error', 'message' => 'Invalid input'], 400);
        }

        $logData = [
            'waste_type' => $data->type ?? null,
            'bag_size' => $data->size ?? null,
            'is_recyclable' => $data->recyclable ?? null,
            'date_of_disposal' => $data->date ?? null,
            'user_id' => $data->user_id ?? null, // THis is to associate logs with users
        ];

        $result = $this->model->insert($logData);

        if ($result) {
            return $this->respond(['status' => 'success', 'message' => 'Waste log added']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Failed to add log'], 500);
        }
    }

    public function getUserWasteLogs($userId) {
        $model = new WasteLogModel();

        $wasteLogs = $model->where('user_id', $userId)->findAll();

        if ($wasteLogs) {
            return $this->respond($wasteLogs);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'No logs found'], 404);
        }
    }

    public function deleteWasteLog($id)
{
    $model = new WasteLogModel();

    $wasteLog = $model->find($id);

    if (!$wasteLog) {
        return $this->respond(['status' => 'error', 'message' => 'Waste log not found'], 404);
    }

    // Proceed to delete the waste log
    if ($model->delete($id)) {
        return $this->respond(['status' => 'success', 'message' => 'Waste log deleted successfully']);
    } else {
        return $this->respond(['status' => 'error', 'message' => 'Failed to delete waste log'], 500);
    }
}
}
