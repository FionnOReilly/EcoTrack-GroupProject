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
        try {
            $email = $this->request->getJSON()->email;
            $password = $this->request->getJSON()->password;
    
            // Check if user exists
            $user_data = $this->model->getUserByEmail($email);
    
            if ($user_data && password_verify($password, $user_data->password)) {
                return $this->respond([
                    "user_id" => $user_data->user_id,
                    "token" => "access.token",
                    "message" => "Login successful"
                ], 200);
            } else {
                return $this->respond([
                    "message" => "Invalid email or password"
                ], 401);
            }
        } catch (\Exception $e) {
            log_message("error", "Login failed: " . $e->getMessage());
            return $this->respond([
                "message" => "An error occurred. Please try again later."
            ], 500); // Internal server error
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