<?php

namespace ColdBolt\Validator\Constraint;

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