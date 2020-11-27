<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Routing\Router;

ColdBolt\Autoloader::register();

$routes = [
    '/thread/{id}/{path}/' => 'forum',
    '/' => 'index',
    '/booking' => 'booking',
];

$request = Request::createFromGlobals();

$response = new Response();
$router = new Router($routes);

var_dump($router->match($request->getURI()));
