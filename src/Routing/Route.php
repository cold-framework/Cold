<?php

namespace ColdBolt\Routing;

class Route
{
    private string $controller;
    private string $path;

    private array $uri_dyn_part;

    public function __construct(string $controller, string $path)
    {
        $this->controller = $controller;
        $this->path = $path;
    }

    public function addDynPart(string $partName, string $part): self
    {
        $this->uri_dyn_part[$partName] = $part;
        return $this;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getDynPart(): array
    {
        return $this->uri_dyn_part;
    }
}
