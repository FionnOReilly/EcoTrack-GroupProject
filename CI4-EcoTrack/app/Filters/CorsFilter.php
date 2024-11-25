<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CorsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Allow CORS for specific origin (e.g., Vue.js frontend at localhost:8082)
        header("Access-Control-Allow-Origin: http://localhost:8082"); // or '*' to allow all origins
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With");
        header("Access-Control-Allow-Credentials: true");

        // If it's an OPTIONS request (preflight), respond immediately with 200
        if ($request->getMethod() === 'options') {
            header('HTTP/1.1 200 OK');
            exit();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Optionally set headers in the after method to ensure they're in the response
        // This can be useful if the headers are not being set correctly in the `before` method.
        $response->setHeader('Access-Control-Allow-Origin', 'http://localhost:8082') // Adjust to match your frontend's origin
                 ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                 ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Origin, Accept')
                 ->setHeader('Access-Control-Allow-Credentials', 'true');
    }
}
