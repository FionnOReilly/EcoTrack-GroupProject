<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class WasteLogController extends ResourceController
{
    protected $modelName = 'App\Models\WasteLogModel';
    protected $format = 'json'; 
    

    public function index(){

        $wastelog = $this->model->findAll();
        return $this->respond($wastelog);
    }

    public function addWasteLog()
    {
        $data = $this->request->getJSON();
    
        $this->model->insertWasteLog((array)$data);
    
    }
}