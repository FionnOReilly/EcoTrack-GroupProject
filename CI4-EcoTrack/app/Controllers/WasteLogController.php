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

        // Validate the input data
        if (!isset($data->type, $data->size, $data->recyclable, $data->date, $data->user_id)) {
            return $this->respond(['status' => 'error', 'message' => 'Missing required fields'], 400);
        }

        $logData = [
            'waste_type' => $data->type ?? null,
            'bag_size' => $data->size ?? null,
            'is_recyclable' => $data->recyclable ?? null,
            'date_of_disposal' => $data->date ?? null,
            'user_id' => $data->user_id ?? null,
        ];

        $result = $this->model->insert($logData);

        if ($result) {
            return $this->respond(['status' => 'success', 'message' => 'Waste log added']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Failed to add log'], 500);
        }
    }

    public function getUserWasteLogs($userId) {
        $logs = $this->model->where('user_id', $userId)->findAll();

        if ($logs) {
            return $this->respond($logs);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'No logs found'], 404);
        }
    }

    public function calculateCarbon()
    {
        $userId = $this->request->getHeaderLine('User-Id');
        if (!$userId) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'User ID is required']);
        }

        $logs = $this->model->where('user_id', $userId)->findAll();
        if (empty($logs)) {
            return $this->respond(['error' => 'No waste logs found for the user'], 404);
        }

        $carbonSaved = 0;
        $bagSizes = ['1L' => 0.2, '5L' => 1, '20L' => 4, '50L' => 10, '100L' => 20];
        $carbonFactors = ['general' => 0.5, 'recyclable' => 1.5, 'organic' => 0.8, 'glass' => 0.2];

        foreach ($logs as $log) {
            $size = $bagSizes[$log['bag_size']] ?? 0;
            $factor = $carbonFactors[$log['waste_type']] ?? 0;
            $carbonSaved += $size * $factor;
        }

        return $this->response->setJSON(['carbonSaved' => $carbonSaved]);
    }

public function getCarbonData($userId)
{
    $logs = $this->model
        ->select('date_of_disposal AS date, bag_size, waste_type')
        ->where('user_id', $userId)
        ->orderBy('date_of_disposal', 'asc')
        ->findAll();

    if (empty($logs)) {
        return $this->respond(['status' => 'error', 'message' => 'No carbon data found'], 404);
    }

    $carbonData = [];
    $bagSizes = ['Small Bag (25L)' => 0.5, 'Medium Bag(50L)' => 1.0, 'Large Bag (75L)' => 1.5];
    $carbonFactors = ['general' => 0.5, 'recyclable' => 1.5, 'organic' => 0.8, 'glass' => 0.2];

    foreach ($logs as $log) {
        $size = $bagSizes[$log['bag_size']] ?? 0;
        $factor = $carbonFactors[$log['waste_type']] ?? 0;
        $carbonSaved = $size * $factor;

        $carbonData[] = [
            'date' => $log['date'], 
            'carbonSaved' => $carbonSaved,
        ];
    }

    return $this->respond($carbonData);
}


}
