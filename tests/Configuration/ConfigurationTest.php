<?php


namespace Tests\Configuration;


use ColdBolt\Configuration\Configuration;
use ColdBolt\Tests\CommonTestCase;
use ColdBolt\Tests\Test;

class ConfigurationTest extends CommonTestCase
{

    #[Test]
    public function has_configuration_value(): void
    {
        $has_data_directory_key = (new Configuration(__DIR__ . '/Fixtures/'))
            ->has('framework.data');

        $this->assertTrue($has_data_directory_key);
    }

    #[Test]
    public function has_not_configuration_value(): void
    {
        $has_not_data_directory_key = (new Configuration(__DIR__ . '/Fixtures/'))
            ->has('framework.log_level');

        $this->assertFalse($has_not_data_directory_key);
    }

    #[Test]
    public function get_configuration_value(): void
    {
        $data_directory = (new Configuration(__DIR__ . '/Fixtures/'))
            ->get('framework.data');

        $this->assertEquals('var/', $data_directory);
    }
}