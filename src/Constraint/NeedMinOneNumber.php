<?php

namespace App\Constraint;

use App\Constraint\Constraint;

class NeedMinOneNumber extends Constraint {

    public function validate(): bool
    {
        return true;
    }
}