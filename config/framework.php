<?php

$autoload_dev = [
    "files" => [
        "src/Debug/debug.php"
    ],
    "psr-4" => [
        "Tests" => "tests/",
    ],
];

$autoload = [
    "psr-4" => [
        "App\\" => "app/",
        "ColdBolt\\" => "src/"
    ],
];

return [
    "autoload" => $autoload,
    "autoload-dev" => $autoload_dev,
    "controller" => "App\\Controller\\",
    "data" => "var/",
    "log_level" => "TRACE",
];