<?php

namespace ColdBolt\Routing;

class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function match(string $uri): ?Route
    {
        $path = $this->split_uri($uri);

        foreach ($this->routes as $route_path => $controller) {
            $route_part = $this->split_uri($route_path);

            $route = new Route($controller, $route_path);

            $isRouteFinded = true;
            $route_part_counted = 0;
            foreach ($route_part as $index => $part) {

                if (str_starts_with($part, '{')) {
                    $part = str_replace(['{', '}'], '', $part);
                    $route->addDynPart($part, $path[$index]);
                    $route_part_counted++;
                    continue;
                }

                if (isset($path[$index]) && $part === $path[$index]) {
                    $route_part_counted++;
                    continue;
                }

                $isRouteFinded = false;
                break;
            }

            if ($isRouteFinded && $route_part_counted === count($path)) {
                return $route;
            }
        }

        return null;
    }

    private function split_uri(string $uri): array
    {
        $uri_parts_without_slash = array_filter(explode('/', $uri));
        $uri_parts = [];

        foreach ($uri_parts_without_slash as $part) {
            if (empty($part)) {
                continue;
            }
            $uri_parts[] = '/';
            $uri_parts[] = $part;
        }

        !empty($uri_parts) ?: $uri_parts[] = '/';
        return $uri_parts;
    }
}
