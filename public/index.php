<?php

require_once __DIR__ . '/../src/Autoload/Autoloader.php';

use App\Kernel;

ColdBolt\Autoloader::register();
Kernel::init();