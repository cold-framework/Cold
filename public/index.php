<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use ColdBolt\Configuration;
use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Logger\Logger;
use ColdBolt\AbstractController;
use ColdBolt\Routing\RouteHandler;

ColdBolt\Autoloader::register();

$configuration = new Configuration();
$logger = new Logger('app.txt', $configuration->getDataDir() . '/logs/', $configuration->isDebug());

$routes = $configuration->getRoutes();

$request = Request::createFromGlobals();
$response = new Response();

$route = RouteHandler::handle($routes, $request);

list($class, $function) = explode('@', $route);
$class = $configuration->getControllersNamespace() . $class;

/** @var AbstractController */
$controller = new $class($request, $response, $configuration, $logger);
call_user_func_array(array($controller, $function), []);
