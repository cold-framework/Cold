<?php

namespace ColdBolt;

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Logger\Logger;
use ColdBolt\Routing\Route;
use ColdBolt\Template\Template;
use ColdBolt\Routing\Exception\AttributNotDefinedException;

abstract class AbstractController
{
    public function __construct(
        protected Request $request,
        protected Response $response,
        protected Route $route,
        protected Configuration $configuration,
        protected Logger $logger,
        protected Template $template){}

    public function getRouteAttr(string $attr_name): string
    {
        if (!isset($this->route->getDynPart()[$attr_name])) {
            throw new AttributNotDefinedException;
        }

        return $this->route->getDynPart()[$attr_name];
    }

    public function render(string $template_name, ?array $params = null): Response
    {
        $template_content = $this->template->setTemplate($template_name)->render($params);
        $this->response->write($template_content);
        return $this->response;
    }
}
