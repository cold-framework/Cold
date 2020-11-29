<?php

namespace ColdBolt;

use ColdBolt\Configuration;
use ColdBolt\Http\Request;
use ColdBolt\AbstractController;
use ColdBolt\Autoload\Container;
use ColdBolt\Http\Session;
use ColdBolt\Routing\RouteHandler;

abstract class BaseKernel
{
    public static function init() {
        $container = new Container();

        /** @var Configuration */
        $configuration = $container->get(Configuration::class);
        $container->setInstance(Request::createFromGlobals());

        $routes = $configuration->getRoutes();
        /** @var Request */
        $request = $container->get(Request::class);
        $route = RouteHandler::handle($routes, $request);

        $session = (new Session())->set('lang', ($request->hasQuery('lang') ? $request->getQuery('lang') : $configuration->getDefaultLang()));
        $container->setInstance($session);

        list($class, $function) = explode('@', $route);
        $class = $configuration->getControllersNamespace() . $class;
        
        /** @var AbstractController */
        $controller = $container->get($class);
        call_user_func_array(array($controller, $function), []);
    }
}
