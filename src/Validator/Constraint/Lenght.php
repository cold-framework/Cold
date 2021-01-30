<?php


namespace ColdBolt\Validator\Constraint;


#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Lenght extends Constraint
{
    public function __construct(?int $min = null, ?int $max = null)
    {

    }

    public function validate(): bool
    {
        // TODO: Implement validate() method.
    }
}