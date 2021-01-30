<?php

namespace App\Models\Form;

use ColdBolt\Validator\Constraint\Lenght;
use ColdBolt\Validator\Constraint\Date;
use ColdBolt\Validator\Constraint\Email;
use ColdBolt\Validator\Constraint\Number;
use ColdBolt\Validator\Constraint\Required;

class BookingForm extends Validator {

    #[Required]
    #[Date(format: 'default-html')]
    private string $arrival;

    #[Required]
    #[Date(format: 'default-html')]
    private string $departure;

    #[Required]
    #[Number(min: 1, max: 10)]
    private string $adult;

    #[Number(min: 1, max: 10)]
    private string $child;

    #[Required]
    #[Lenght(min: 3)]
    private string $name;

    #[Required]
    #[Lenght(min: 3)]
    private string $surname;

    #[Required]
    #[Email]
    private string $email;

    #[Required]
    private string $phone;

    #[Required]
    private string $city;

    #[Required]
    #[Number]
    private string $postal_code;

    private string $informations;

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
        $this->informations = $data['informations'];

        $this->validate();
    }

    public function getArrival(): string
    {
        return $this->arrival;
    }

    public function getDeparture(): string
    {
        return $this->departure;
    }

    public function getAdult(): string
    {
        return $this->adult;
    }

    public function getChild(): string
    {
        return $this->child;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    public function getInformations(): string
    {
        return $this->informations;
    }
}