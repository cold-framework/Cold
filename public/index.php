<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use ColdBolt\Configuration;
use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Logger\Logger;
use ColdBolt\Routing\Router;
use ColdBolt\AbstractController;
use ColdBolt\Template\Template;

ColdBolt\Autoloader::register();

$configuration = new Configuration();
$logger = new Logger('app.txt', $configuration->getDataDir() . '/logs/', $configuration->isDebug());

$routes = $configuration->getRoutes();

$request = Request::createFromGlobals();
$response = new Response();

$router = new Router($routes);
$route = $router->match($request->getURI());

if(null === $route) { // 404
    $template = (new Template('_error/404'))->render();
    $response->setHTTPCode(404);
    $response->write($template);
    $response->send();
    exit();
}

list($class, $function) = explode('@', $route);
$class = $configuration->getControllersNamespace() . $class;

/** @var AbstractController */
$controller = new $class($request, $response, $configuration, $logger);
call_user_func_array(array($controller, $function), []);
