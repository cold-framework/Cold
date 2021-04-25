<?php

namespace ColdBolt\Routing;

class Route
{
    private ?string $name;
    private string $url;
    private string $controller;
    private array $methods;

    private array $url_dyn_part;

    public function __construct(array $route)
    {
        $route = array_merge([
            'name' => null,
            'methods' => [],
        ], $route);

        $this->name = $route['name'];
        $this->controller = $route['controller'];
        $this->url = $route['url'];
        $this->methods = $route['methods'];
    }

    public function add_dynamic_part(string $key, string $value): self
    {
        $this->url_dyn_part[$key] = $value;
        return $this;
    }

    public function get_controller(): string
    {
        return $this->controller;
    }

    public function get_url(): string
    {
        return $this->url;
    }

    public function get_dynamic_part(): array
    {
        return $this->url_dyn_part;
    }

    public function has_method(string $method): bool
    {
        return in_array($method, $this->methods);
    }
}
