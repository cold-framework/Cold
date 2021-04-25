<?php

return [
    [
        "name" => "homepage",
        "url" => "/",
        "controller" => "ExempleController@index",
        "methods" => ["GET"],
    ],
    [
        "name" => "say_hello",
        "url" => "/hello/{name}",
        "controller" => "ExempleController@sayHello",
        "methods" => ["GET"],
    ],
    [
        "name" => "booking",
        "url" => "/booking",
        "controller" => "ExempleController@booking",
        "methods" => ["POST"],
    ]
];