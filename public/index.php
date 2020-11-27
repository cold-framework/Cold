<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use ColdBolt\Configuration;
use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Routing\Router;
use ColdBolt\Routing\AbstractController;

ColdBolt\Autoloader::register();

$configuration = new Configuration();

$routes = $configuration->getRoutes();

$request = Request::createFromGlobals();
$response = new Response();

$router = new Router($routes);
$route = $router->match($request->getURI());

list($class, $function) = explode('@', $route);
$class = $configuration->getControllersNamespace() . $class;

/** @var AbstractController */
$controller = new $class($request, $response);
call_user_func_array(array($controller, $function), []);
