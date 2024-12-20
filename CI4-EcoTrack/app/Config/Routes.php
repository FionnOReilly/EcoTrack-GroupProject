<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Test route

$routes->post('test', 'Home::test');
$routes->post('/login', 'AuthenticationController::login', ['filter' => 'cors']);
$routes->post('login', 'AuthenticationController::login',['filter' => 'cors']);
$routes->post('/admin-login', 'AuthenticationController::adminLogin', ['filter' => 'cors']);
$routes->post('admin-login', 'AuthenticationController::adminLogin', ['filter' => 'cors']);
$routes->post('logout', 'AuthenticationController::logout');

$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::index');
$routes->get('users', 'UserController::index');
$routes->get('users/show/(:num)', 'UserController::show/$1');

$routes->get('/wastelog', 'WasteLogController::index',['filter' => 'cors']);
$routes->get('wastelog/user/(:num)', 'WasteLogController::getUserWasteLogs/$1', ['filter' => 'cors']);

$routes->post('/addWasteLog', 'WasteLogController::addWasteLog',['filter' => 'cors']);
$routes->post('registerUser', 'UserController::registerUser');
$routes->get('/AdminHome', 'Admin::index'); // AdminHome
$routes->get('/ManageUsers', 'Admin::manageUsers'); // ManageUsers
$routes->get('/ManageAdmin', 'Admin::manageAdmin'); // ManageAdmin
$routes->get('/InsertAdmin', 'Admin::insertAdmin'); // InsertAdmin
$routes->get('/ViewAdmin', 'Admin::viewAdmin'); // ViewAdmin

$routes->options('login', 'AuthenticationController::login');
$routes->options('test', 'Home::options');
$routes->setTranslateURIDashes(true);




$routes->post('/admindetails', 'Admin::addDetails'); // Example POST route
$routes->post('/login', 'Auth::authenticateUser'); // Example login endpoint
$routes->post('/register', 'Registration::registerUser'); // Example registration endpoint


return $routes;
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
