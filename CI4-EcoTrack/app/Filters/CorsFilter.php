<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CorsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';

        // Allow only your frontend's origin
        if ($origin === "http://localhost:8082") {
            header("Access-Control-Allow-Origin: $origin");
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
            header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With");
            header("Access-Control-Allow-Credentials: true");
        }

        // Handle preflight (OPTIONS) requests
        if ($request->getMethod() === 'options') {
            header('HTTP/1.1 200 OK');
            exit();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';

        if ($origin === 'http://localhost:8082') {
            $response->setHeader("Access-Control-Allow-Origin", $origin)
                     ->setHeader("Access-Control-Allow-Methods", "GET, POST, OPTIONS, PUT, DELETE")
                     ->setHeader("Access-Control-Allow-Headers", "Content-Type, Authorization, X-Requested-With, Origin, Accept")
                     ->setHeader("Access-Control-Allow-Credentials", "true");
        }

        return $response; // Ensure the response is returned
    }
}
