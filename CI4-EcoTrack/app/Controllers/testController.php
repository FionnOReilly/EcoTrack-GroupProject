<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Config;

class TestController extends Controller
{
    public function testDatabaseConnection()
    {
        // Try to get the database connection instance
        try {
            $db = \Config\Database::connect(); // This will connect to the database
            echo "Database connected successfully!";
        } catch (\Exception $e) {
            // If connection fails, catch the exception and display the error
            echo "Database connection failed: " . $e->getMessage();
        }
    }
}
