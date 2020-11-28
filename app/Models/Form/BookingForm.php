<?php

namespace App\Models\Form;

use App\Validator\BookingFormValidator;
use ColdBolt\Validator\ValidableModel;

class BookingForm implements ValidableModel {
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
    }

    public function validate(): bool
    {
        return (new BookingFormValidator(get_object_vars($this)))->validate();
    }


    public function getArrivalDate(): string
    {
        return $this->arrival;
    }


    public function getDepartureDate(): string
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

    
}