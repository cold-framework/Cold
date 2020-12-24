<?php

namespace ColdBolt\Tests;

use ColdBolt\Tests\Error\AssertError;
use JetBrains\PhpStorm\Pure;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Test
{
    private string $name;
    private bool $canFail;

    private array $before = [];
    private array $after = [];

    private ?AssertError $error = null;
    private ?string $error_message = null;

    public function __construct(bool $canFail = false, ?string $error_message = null)
    {
        $this->canFail = $canFail;
        $this->error_message = $error_message;
    }

    public function run(Object $ctx): void
    {
        foreach ($this->before as $before) {
            $ctx->$before();
        }

        $name = $this->name;

        try {
            $ctx->$name();
        } catch (AssertError $e) {
            $this->error = $e;
        }

        foreach ($this->after as $after) {
            $ctx->$after();
        }

    }

    public function canFail(): bool
    {
        return $this->canFail;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getError(): AssertError
    {
        return $this->error;
    }

    #[Pure] public function hasError(): bool
    {
        return !is_null($this->error);
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function addBefore(object $before): self
    {
        $this->before[] = $before;
        return $this;
    }

    public function addAfter(object $after): self
    {
        $this->after[] = $after;
        return $this;
    }
}
