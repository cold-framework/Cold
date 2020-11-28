<?php

namespace App\Validator;

use ColdBolt\Validator\Validator;
use ColdBolt\Validator\Constraint\Date;
use ColdBolt\Validator\Constraint\Email;
use ColdBolt\Validator\Constraint\Number;
use ColdBolt\Validator\Constraint\Optional;
use ColdBolt\Validator\Constraint\Required;

class BookingFormValidator extends Validator
{
    public function getValidationFields(): array
    {
        return [
            'arrival' => [Required::class, Date::class],
            'departure' => [Required::class, Date::class],
            'adult' => [Required::class, Number::class],
            'child' => [Optional::class, Number::class],
            'name' => [Required::class],
            'surname' => [Required::class],
            'email' => [Required::class, Email::class],
            'phone' => [Required::class],
            'city' => [Required::class],
            'postal_code' => [Required::class, Number::class],
        ];
    }
}
