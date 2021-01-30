<?php

namespace Tests;

use ColdBolt\Http\Request;
use ColdBolt\Tests\ControllerTestCase;
use ColdBolt\Tests\Test;

class HomepageControllerTest extends ControllerTestCase
{
    #[Test(error_message: "Le test passe pas")]
    public function should_have_http_code_200(): void
    {
        $request = new Request([], [], [], [], [
            'REQUEST_METHOD' => 'GET',
            'REMOTE_ADDR' => '0.0.0.0',
            'REQUEST_URI' => '/'
        ]);

        $response = $this->handle($request);
        $this->assertSame(200, $response->getHTTPCode());
    }
}
