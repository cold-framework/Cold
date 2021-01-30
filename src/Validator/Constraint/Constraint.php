<?php

namespace ColdBolt\Validator\Constraint;

abstract class Constraint
{
    protected string $data;
    protected array $errors = [];

    abstract public function validate(): bool;

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setData(string $data): self
    {
        $this->data = $data;
        return $this;
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
