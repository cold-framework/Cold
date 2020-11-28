<?php

namespace ColdBolt\Routing;

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Template\Template;

class RouteHandler {
    public static function handle(array $routes, Request $request): string {
        $router = new Router($routes);
        $route = $router->match($request->getURI());

        if(null === $route) { 
            self::notFound();
        }

        return $route;
    }

    public static function notFound() {
        $template = (new Template('_error/404'))->render();
        $response = new Response();
        $response->setHTTPCode(404);
        $response->write($template);
        $response->send();
        exit();
    }
}