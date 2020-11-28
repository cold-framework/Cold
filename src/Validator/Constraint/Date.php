<?php

namespace ColdBolt\Validator\Constraint;

class Date extends Constraint {
    public function validate(): bool
    {
        $date = \DateTimeImmutable::createFromFormat('Y-m-d', $this->data);
        return $date && $date->format('Y-m-d') == $this->data;
    }
}