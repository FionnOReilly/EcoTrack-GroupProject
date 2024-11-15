<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class LoginController extends ResourceController
{
   use ResponseTrait;

   public function login(){

    $outh = new OAuth;
    $request= new Request();
    $respond = $outh->server->handleTokenRequest($request->createFromGlobals());
    $code = $respond->getStatusCode();
    $body = $respond->getResponseBody();

    return $this->respond(json_decode($body), $code);
    
   }
}