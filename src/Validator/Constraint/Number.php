<?php

namespace ColdBolt\Validator\Constraint;

class Number extends Constraint
{
    public function validate(): bool
    {
        return is_numeric($this->data);
    }
}