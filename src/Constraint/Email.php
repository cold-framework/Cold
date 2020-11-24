<?php


namespace App\Constraint;

class Email extends Constraint
{
    public function validate(): bool
    {
        if(!filter_var($this->data, FILTER_VALIDATE_EMAIL)) {
            $this->addError('This email is invalid');
        }

        return empty($this->getErrors());
    }
}