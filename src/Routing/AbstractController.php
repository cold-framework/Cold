<?php

namespace ColdBolt\Routing;

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;
use ColdBolt\Template\Template;

abstract class AbstractController {

    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function render(string $template, ?array $params = null) {
        $template = (new Template($template))->render($params);
        $this->response->write($template);
        $this->response->send();
    }
}