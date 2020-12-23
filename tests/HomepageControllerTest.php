<?php

namespace Tests;

use ColdBolt\Tests\ControllerTestCase;

class HomepageControllerTest extends ControllerTestCase
{
    #[Test(error_message: "Le test passe pas", can_be_fail: true)]
    public function should_have_http_code_200(): void
    {
        


        $this->assertSame(200, $code);
    }
}
