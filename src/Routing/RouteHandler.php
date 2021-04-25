<?php

namespace ColdBolt\Routing;

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Template\Template;
use JetBrains\PhpStorm\NoReturn;

class RouteHandler
{
    public static function handle(array $routes, Request $request): ?Route
    {
        $router = new Router($routes);
        return $router->match($request->getURI(), $request->getMethod());
    }
}
