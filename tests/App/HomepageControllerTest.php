<?php

namespace Tests\App;

use ColdBolt\Http\Request;
use ColdBolt\Tests\ControllerTestCase;
use ColdBolt\Tests\Test;

class HomepageControllerTest extends ControllerTestCase
{
    #[Test]
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

    #[Test]
    public function should_have_http_code_404(): void
    {
        $request = new Request([], [], [], [], [
            'REQUEST_METHOD' => 'GET',
            'REMOTE_ADDR' => '0.0.0.0',
            'REQUEST_URI' => '/non-existing-url/'
        ]);

        $response = $this->handle($request);
        $this->assertSame(404, $response->getHTTPCode());
    }
}
