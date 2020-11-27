<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Routing\Router;
use ColdBolt\Template\Template;

ColdBolt\Autoloader::register();

$routes = [
    '/' => 'index',
    '/booking' => 'booking',
];

$request = Request::createFromGlobals();

$response = new Response();
$router = new Router($routes);
$route = $router->match($request->getURI());

$template = (new Template($route))->render();
$response->write($template);
$response->send();