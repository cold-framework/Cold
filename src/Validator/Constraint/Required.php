<?php

namespace ColdBolt\Validator\Constraint;

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
