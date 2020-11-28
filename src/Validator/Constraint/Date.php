<?php

namespace ColdBolt\Validator\Constraint;

class Date extends Constraint {
    public function validate(): bool
    {
        $date = \DateTimeImmutable::createFromFormat('Y-m-d', $this->data);
        if(!($date && $date->format('Y-m-d') == $this->data)) {
            $this->addError('This date is not valid');
        }

        return empty($this->errors);
    }
}