<?php

namespace ColdBolt\Validator\Constraint;

class Email extends Constraint
{
    public function validate(): bool
    {
        if (!filter_var($this->data, FILTER_VALIDATE_EMAIL)) {
            $this->addError('Invalid Email');
        }

        return empty($this->getErrors());
    }
}
