<?php

namespace ColdBolt\Validator\Constraint;

class Number extends Constraint
{
    public function validate(): bool
    {
        if (!is_numeric($this->data)) {
            $this->addError('Invalid Number');
        }

        return empty($this->getErrors());
    }
}