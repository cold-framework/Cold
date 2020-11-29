<?php

namespace ColdBolt;

use ColdBolt\Http\Request;
use ColdBolt\Configuration;
use ColdBolt\Http\Response;
use ColdBolt\Logger\Logger;
use ColdBolt\Template\Flashbag;
use ColdBolt\Template\Template;

abstract class AbstractController {

    protected Request $request;
    protected Response $response;
    protected Configuration $configuration;
    protected Logger $logger;
    protected Flashbag $flashbag;

    public function __construct(Request $request, Response $response, Configuration $configuration, Logger $logger, Flashbag $flashbag)
    {
        $this->request = $request;
        $this->response = $response;
        $this->configuration = $configuration;
        $this->logger = $logger;
        $this->flashbag = $flashbag;
    }

    public function render(string $template_name, ?array $params = null) {
        $template = (new Template($this->configuration->getTemplatesDir()))->setTemplate($template_name)->render($params);
        $this->response->write($template);
        $this->response->send();
        $this->logger->debug($this->request->getIP() . ': ' .  $template_name . ' was render, the response was send');
    }
}