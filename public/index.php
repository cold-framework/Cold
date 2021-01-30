<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use App\Kernel;
use ColdBolt\Http\Request;

ColdBolt\Autoloader::register();

$kernel = new Kernel;
$request = Request::createFromGlobals();

$response = $kernel->handle($request);
$response->send();