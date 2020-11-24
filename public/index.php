<?php

require_once __DIR__ . '/../src/autoload.php';

Autoloader::register();

(new App\Template('index'))->render();
