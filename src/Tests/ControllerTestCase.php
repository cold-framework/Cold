<?php

namespace ColdBolt\Tests;

use App\Kernel;
use ColdBolt\Http\Request;
use ColdBolt\Http\Response;

abstract class ControllerTestCase extends CommonTestCase
{
    protected function handle(Request $request): Response
    {
        return (new Kernel())->handle($request);
    }
}
