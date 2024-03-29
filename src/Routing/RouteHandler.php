<?php

namespace ColdBolt\Routing;

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Template\Template;
use JetBrains\PhpStorm\NoReturn;

class RouteHandler
{
    public static function handle(array $routes, Request $request): Route
    {
        $router = new Router($routes);
        $route = $router->match($request->getURI());

        if (null === $route) {
            self::notFound();
        }

        return $route;
    }

    #[NoReturn] public static function notFound(): void
    {
        $template = (new Template())
            ->setTemplate('_http_error_code/404')
            ->render();
        $response = new Response();
        $response->setHTTPCode(404);
        $response->write($template);
        $response->send();
        exit();
    }
}
