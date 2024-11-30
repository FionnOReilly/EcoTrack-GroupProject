<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class LeaderboardController extends ResourceController
{
    protected $modelName = 'App\Models\LeaderboardModel';
    protected $format = 'json'; 

    public function index()
{
    $this->model->updateLeaderboard();

    $leaderboard = $this->model->findAll();


    return $this->respond($leaderboard);  
}
}
