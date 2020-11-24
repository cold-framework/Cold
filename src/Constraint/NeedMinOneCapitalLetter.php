<?php

namespace App\Constraint;

use App\Constraint\Constraint;

class NeedMinOneCapitalLetter extends Constraint {
    
    public function validate(): bool
    {
        return true;
    }

    public function getErrors(): array
    {
        return [];
    }
}