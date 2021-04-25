<?php

namespace ColdBolt;

use ColdBolt\Configuration\Configuration;
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

        $routes = $configuration->get('route');
        $route = RouteHandler::handle($routes, $request);

        if (null === $route) {
            return (new Response())
                ->setHTTPCode(404);
        }
        $container->setInstance($route);

        [$class, $function] = explode('@', $route->get_controller());
        $class = $configuration->get('framework.controller') . $class;

        /** @var AbstractController */
        $controller = $container->get($class);
        return call_user_func_array(array($controller, $function), []);
    }
}
