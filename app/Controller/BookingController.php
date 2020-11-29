<?php

namespace App\Controller;

use App\Models\Form\BookingForm;
use ColdBolt\FileSystem\Writer;
use ColdBolt\AbstractController;

class BookingController extends AbstractController {

    public function index() {
        if($this->request->hasContent('arrival')) {
            $this->handleBookingForm();

            $this->error();
        }

        $this->render('booking', [
            'title' => 'Réservation | La Loire à vélo'
        ]);
    }

    public function sucess() {
        $this->render('sucess_booking', [
            'title' => 'Confirmation de la réservation | La Loire à vélo'
        ]);
    }

    public function error() {
        $this->render('error_booking', [
            'title' => 'Echeque de la réservation | La Loire à vélo'
        ]);
    }

    public function handleBookingForm() {

        $form_data_file = $this->configuration->getDataDir() . DIRECTORY_SEPARATOR . 'data' . 'booking.txt';
        $form = new BookingForm($this->request->getContents());

        if(!$form->validate()) {
            var_dump($form->getErrors());
            exit;
        }

        $date = date('d-m-Y H:i:s');

        $arrival = $form->getArrivalDate();
        $departure = $form->getDepartureDate();
        $adult = $form->getAdult();
        $child = $form->getChild();
        $name = $form->getName();
        $surname =$form->getSurname();
        $email = $form->getEmail();
        $phone = $form->getPhone();
        $city = $form->getCity();
        $postal_code = $form->getPostalCode();

        $content = <<<FORMDATA
--------------------
Date de soumission du formulaire: $date

Date d'arriver: $arrival
Date de départ: $departure
Nombre d'adulte: $adult
Nombre d'enfant: $child
Nom: $name
Prénom: $surname
Email: $email
Numéro de téléphone: $phone
Ville: $city
Code postal: $postal_code

FORMDATA;

        Writer::write($form_data_file, $content);
    }
}