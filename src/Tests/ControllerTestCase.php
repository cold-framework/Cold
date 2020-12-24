<?php

namespace ColdBolt\Tests;

use ColdBolt\Http\Request;
use ColdBolt\Http\Response;

abstract class ControllerTestCase extends CommonTestCase
{
    public function __construct(
        protected Request $request,
        protected Response $response)
    {
    }
}
