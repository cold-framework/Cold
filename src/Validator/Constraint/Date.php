<?php

namespace ColdBolt\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Date extends Constraint
{

    public function __construct(?int $format = null)
    {

    }

    public function validate(): bool
    {
        $date = \DateTimeImmutable::createFromFormat('Y-m-d', $this->data);
        if (!($date && $date->format('Y-m-d') == $this->data)) {
            $this->addError('This date is not valid');
        }

        return empty($this->errors);
    }
}