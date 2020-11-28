<?php

namespace App\Validator;

use ColdBolt\Validator\Validator;
use ColdBolt\Validator\Constraint\Date;
use ColdBolt\Validator\Constraint\Number;
use ColdBolt\Validator\Constraint\NotBlank;

class BookingFormValidator extends Validator
{
    public function getValidationFields(): array
    {
        return [
            'arrival' => [NotBlank::class, Date::class],
            'departure' => [NotBlank::class, Date::class],
            'adult' => [NotBlank::class, Number::class],
            // 'child' => [Constraint\Optional::class, Constraint\Number::class],
            // 'name' => [Constraint\NotBlank::class, Constraint\Str::class, Constraint\Str\MaxSize_50::class],
            // 'surname' => [Constraint\NotBlank::class, Constraint\Str::class, Constraint\Str\MaxSize_50::class],
            // 'email' => [Constraint\NotBlank::class, Constraint\Email::class],
            // 'phone' => [Constraint\NotBlank::class, Constraint\Str\MaxSize_50::class],
            // 'city' => [Constraint\NotBlank::class, Constraint\Str::class, Constraint\Str\MaxSize_50::class],
            // 'postal_code' => [Constraint\NotBlank::class, Constraint\Number::class],
            // 'email' => [Constraint\NotBlank::class, Constraint\Email::class]
        ];
    }
}
