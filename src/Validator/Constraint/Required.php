<?php

namespace ColdBolt\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Required extends Constraint
{
    public function validate(): bool
    {
        if (empty($this->data)) {
            $this->addError('Required field');
        }

        return empty($this->getErrors());
    }
}
