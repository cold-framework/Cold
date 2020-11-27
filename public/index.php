<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Routing\Router;
use ColdBolt\Routing\AbstractController;

ColdBolt\Autoloader::register();

$routes = [
    '/' => 'HomepageController@index',
    '/booking' => 'BookingController@index',
];

$request = Request::createFromGlobals();
$response = new Response();

$router = new Router($routes);
$route = $router->match($request->getURI());

list($class, $function) = explode('@', $route);
$class = 'App\\Controller' . $class;

/** @var AbstractController */
$controller = new $class($request, $response);
call_user_func_array(array($controller, $function), []);
