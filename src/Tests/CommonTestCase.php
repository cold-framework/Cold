<?php

namespace ColdBolt\Tests;

use ColdBolt\Tests\Exception\NonTrueValue;

class CommonTestCase
{
    protected function assertTrue($value)
    {
        if (!$value) {
            throw new NonTrueValue;
        }
    }
}
