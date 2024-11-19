<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel'; // Specify what model this controller uses
    protected $format = 'json'; // Specify format


    public function index(){

        // Retrieve all users from the database, you may also call stored procedures here
        $users = $this->model->findAll();
        // // Return the list using the respond function
        return $this->respond($users);
    }


    public function userLogin()
    {
        $email = $this->request->getJSON()->email;
        $password = $this->request->getJSON()->password;
        
        log_message("debug", "Email: " . $email . " Password: " . $password);
        
        $user_data = $this->model->login($email, $password);
        log_message("debug", "Returned from stored procedure: " . print_r($user_data, true));
        
        if ($user_data && $user_data->user_id) {
            return $this->respond([
                "user_id" => $user_data->user_id,
                "token" => "access.user",
                "code" => "200",
            ], 200); // Success status
        } else {
            return $this->respond([
                "message" => "Invalid email or password",
            ], 401); // Unauthorized status
        }
    }
    

    


    public function delete ($id = null)
    {
        $user = $this->model->find($id);
        if (!$user){
            return $this->failNotFound("User not found");   
        }
        if ($this->model->delete($id)){
            return $this->respondDeleted(["id => $id, 'message' => 'User deleted sucessfully.'"])
        } else {
            return $this->fail("Failed to delete user.");
        }
    }

}