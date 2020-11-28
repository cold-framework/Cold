<?php

namespace ColdBolt\Validator\Constraint;

class Required extends Constraint
{
    public function validate(): bool
    {
        return !empty($this->data);
    }
}
