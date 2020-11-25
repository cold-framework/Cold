<?php

use ColdBolt\Http\Request;
use ColdBolt\Template;

require_once __DIR__ . '/../src/autoload.php';

ColdBolt\Autoloader::register();

// $request = Request::createFromGlobals();
//
// var_dump($request->getURI());
(new Template('index'))->render();
