<?php

namespace ColdBolt\Routing;

use ColdBolt\Configuration;
use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Template\Template;

abstract class AbstractController {

    protected Request $request;
    protected Response $response;
    protected Configuration $configuration;

    public function __construct(Request $request, Response $response, Configuration $configuration)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function render(string $template, ?array $params = null) {
        $template = (new Template($template, $this->configuration->getTemplatesDir()))->render($params);
        $this->response->write($template);
        $this->response->send();
    }
}