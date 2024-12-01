<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // Optional, for dynamic controller methods

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default route
$routes->get('/', 'Home::index');

// Authentication routes
$routes->post('/login', 'AuthenticationController::login', ['filter' => 'cors']);
$routes->post('/admin-login', 'AuthenticationController::adminLogin', ['filter' => 'cors']);
$routes->post('/logout', 'AuthenticationController::logout');
$routes->options('/login', 'AuthenticationController::login'); // CORS 

// User routes
$routes->get('/users', 'UserController::index');
$routes->get('/users/show/(:num)', 'UserController::show/$1');
$routes->post('/registerUser', 'UserController::registerUser');

// WasteLog routes
$routes->get('/wastelog', 'WasteLogController::index', ['filter' => 'cors']);
$routes->get('/wastelog/user/(:num)', 'WasteLogController::getUserWasteLogs/$1', ['filter' => 'cors']);
$routes->post('/addWasteLog', 'WasteLogController::addWasteLog', ['filter' => 'cors']);

// Carbon calculation routes
$routes->get('/wastelog/carbon', 'WasteLogController::calculateCarbon', ['filter' => 'cors']);
$routes->get('/wastelog/carbon/data/(:num)', 'WasteLogController::getCarbonData/$1', ['filter' => 'cors']);

// Dashboard route
$routes->get('/dashboardPage', 'AuthenticationController::dashboardPage', ['filter' => 'cors']);
$routes->get('/dashboardPage/user/(:num)', 'WasteLogController::getUserWasteLogs/$1', ['filter' => 'cors']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * Additional environment-based routes can be loaded here.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
