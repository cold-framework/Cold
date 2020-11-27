<?php

namespace ColdBolt;

use ColdBolt\FileSystem\Reader;

class Configuration {

    private array $config;

    public function __construct()
    {
        $this->config = json_decode(Reader::read(__DIR__ . '/../config.json'), true);
    }

    public function getControllersNamespace() {
        return $this->config['controllers'];
    }

    public function getTemplatesDir() {
        return $this->config['templates'];
    }

    public function getRoutes() {
        return $this->config['routes'];
    }
}