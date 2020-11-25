<?php

namespace ColdBolt\Validator\Constraint;

class NotBlank extends Constraint
{
    public function validate(): bool
    {
        return !empty($this->data);
    }

    public function skipAllNextValidation(): bool
    {
        return empty($this->data);
    }
}
