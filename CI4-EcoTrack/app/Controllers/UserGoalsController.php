<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserGoalsController extends ResourceController
{
    protected $modelName = 'App\Models\UserGoalsModel';
    protected $format = 'json'; 

    public function index()
{
    $this->model->updateUserGoalsWithPoints();

    $userGoals = $this->model->findAll();


    return $this->respond($userGoals);  
}
}
