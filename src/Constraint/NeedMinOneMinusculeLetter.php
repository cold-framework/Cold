<?php

namespace App\Constraint;

use App\Constraint\Constraint;

class NeedMinOneMinusculeLetter extends Constraint {

    public function validate(): bool
    {
        return true;
    }
}