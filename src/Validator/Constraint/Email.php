<?php

namespace ColdBolt\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
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
