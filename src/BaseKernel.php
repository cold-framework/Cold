<?php

namespace ColdBolt;

use ColdBolt\Configuration;
use ColdBolt\Http\Request;
use ColdBolt\AbstractController;
use ColdBolt\Autoload\Container;
use ColdBolt\Routing\RouteHandler;

abstract class BaseKernel
{
    public static function init() {
        $container = new Container();
        $configuration = $container->get(Configuration::class);
        $container->set(Request::class, function() {return Request::createFromGlobals();});

        $routes = $configuration->getRoutes();
        $request = $container->get(Request::class);
        $route = RouteHandler::handle($routes, $request);

        list($class, $function) = explode('@', $route);
        $class = $configuration->getControllersNamespace() . $class;
        
        /** @var AbstractController */
        $controller = $container->get($class);
        call_user_func_array(array($controller, $function), []);
    }
}
