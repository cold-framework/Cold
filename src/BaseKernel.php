<?php

namespace ColdBolt;

use ColdBolt\Http\Request;
use ColdBolt\Autoload\Container;
use ColdBolt\Http\Response;
use ColdBolt\Routing\RouteHandler;

abstract class BaseKernel
{
    public function handle(Request $request): Response
    {
        $container = new Container();
        $container->setInstance($request);

        /** @var $configuration Configuration */
        $configuration = $container->get(Configuration::class);

        $routes = $configuration->getRoutes();
        $route = RouteHandler::handle($routes, $request);
        $container->setInstance($route);

        if (null === $route) {
            return (new Response())
                ->setHTTPCode(404);
        }

        [$class, $function] = explode('@', $route->getController());
        $class = $configuration->getControllersNamespace() . $class;

        /** @var AbstractController */
        $controller = $container->get($class);
        return call_user_func_array(array($controller, $function), []);
    }
}
