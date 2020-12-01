<?php

namespace App\Models\Form;

use ColdBolt\Validator\Validator;
use ColdBolt\Validator\FormInterface;
use ColdBolt\Validator\Constraint\Date;
use ColdBolt\Validator\Constraint\Email;
use ColdBolt\Validator\Constraint\Number;
use ColdBolt\Validator\Constraint\Optional;
use ColdBolt\Validator\Constraint\Required;

class BookingForm extends Validator implements FormInterface {
    private string $arrival;
    private string $departure;
    private string $adult;
    private string $child;
    private string $name;
    private string $surname;
    private string $email;
    private string $phone;
    private string $city;
    private string $postal_code;

    public function __construct(array $data)
    {
        $this->arrival = $data['arrival'];
        $this->departure = $data['departure'];
        $this->adult = $data['adult'];
        $this->child = $data['child'];
        $this->name = $data['name'];
        $this->surname = $data['surname'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->city = $data['city'];
        $this->postal_code = $data['postal_code'];

        $this->validate();
    }
    
    public function getData(): array
    {
        $object_data = get_object_vars($this);
        unset($object_data['data']);
        unset($object_data['error']);
        return $object_data;
    }

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