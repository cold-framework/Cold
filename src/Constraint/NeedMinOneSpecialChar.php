<?php

namespace App\Constraint;

use App\Constraint\Constraint;

class NeedMinOneSpecialChar extends Constraint {

    public function validate(): bool
    {
        return true;
    }
}