<?php

namespace ColdBolt\Autoload;

use ReflectionClass;

class Container {
    private array $registery = [];
    private array $factory = [];
    private array $instances = [];

    public function set(string $key, Callable $resolver): self {
        $this->registery[$key] = $resolver;
        return $this;
    }

    public function setInstance($instance): self {
        $key = (new \ReflectionClass($instance))->getName();
        $this->registery[$key] = $instance;
        return $this;
    }

    public function setFactory(string $key, Callable $resolver): self {
        $this->factory[$key] = $resolver;
        return $this;
    }

    public function get(string $key) {
        if(isset($this->factory[$key])) {
            return $this->factory[$key];
        }

        if(!isset($this->instances[$key])) {
            if(isset($this->registery[$key])) {
                $this->instances[$key] = $this->registery[$key]();
            } else {
                $reflection = new ReflectionClass($key);
                $constructor = $reflection->getConstructor();
                $parameters = $constructor->getParameters();
                $constructor_parameters = [];

                foreach($parameters as $parameter) {
                    if($parameter->getClass() && !$parameter->getType()->isBuiltin()) {
                        $constructor_parameters[] = $this->get($parameter->getClass()->getName());
                    } else {
                        $constructor_parameters[] = $parameter->getDefaultValue();
                    }
                }

                if($reflection->isInstantiable()) {
                    $this->instances[$key] = $reflection->newInstanceArgs($constructor_parameters);
                }
            }
        }

        return $this->instances[$key];
    }
}