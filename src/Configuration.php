<?php

namespace ColdBolt;

use ColdBolt\FileSystem\Reader;

class Configuration
{
    private array $config;

    public function __construct()
    {
        $this->config = json_decode(Reader::read(__DIR__ . '/../config.json'), true);
    }

    public function isDebug(): bool
    {
        return $this->config['debug'];
    }

    public function getControllersNamespace(): string
    {
        return $this->config['controllers'];
    }

    public function getTemplatesDir(): string
    {
        return $this->config['templates'];
    }

    public function getTranslationDir(): string
    {
        return $this->config['translation']['dir'];
    }

    public function getDefaultLang(): string
    {
        return $this->config['translation']['default_language'];
    }

    public function getTests(): array
    {
        return $this->config['tests'];
    }

    public function getRoutes(): array
    {
        return $this->config['routes'];
    }

    public function getDataDir(): string
    {
        return __DIR__ . '/../' .$this->config['data'];
    }
}
