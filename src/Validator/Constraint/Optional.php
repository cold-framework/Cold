<?php

namespace ColdBolt\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Optional extends Constraint{
    public function validate(): bool
    {
        return true;
    }

    public function skipAllNextValidation(): bool
    {
        return true;
    }
}