<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CorsFilter implements FilterInterface
{
	
public function before(RequestInterface $request, $arguments = null)
{
    // Respond to preflight requests (OPTIONS)
    if ($request->getMethod() === 'options') {
        $response = service('response');
        $response->setHeader("Access-Control-Allow-Origin", "http://localhost:8082")
                 ->setHeader("Access-Control-Allow-Methods", "GET, POST, OPTIONS, PUT, DELETE")
                 ->setHeader("Access-Control-Allow-Headers", "Content-Type, Authorization, X-Requested-With, Origin, Accept")
                 ->setHeader("Access-Control-Allow-Credentials", "true")
                 ->setStatusCode(200);

        return $response;
    }
}

public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
{
    // Set headers for all other requests
    $response->setHeader("Access-Control-Allow-Origin", "http://localhost:8082")
             ->setHeader("Access-Control-Allow-Methods", "GET, POST, OPTIONS, PUT, DELETE")
             ->setHeader("Access-Control-Allow-Headers", "Content-Type, Authorization, X-Requested-With, Origin, Accept")
             ->setHeader("Access-Control-Allow-Credentials", "true");

    return $response;
}



}
