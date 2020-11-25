<?php

namespace ColdBolt\Validator\Constraint;

abstract class Constraint
{
    protected string $data;
    protected array $errors = [];

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    abstract public function validate(): bool;

    public function getErrors(): array
    {
        return $this->errors;
    }

    
    protected function addError(string $error): void
    {
        $this->errors[] = $error;
    }

    public function skipAllNextValidation(): bool
    {
        return false;
    }
}
