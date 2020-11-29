<?php

namespace App\Controller;

use App\Models\Form\BookingForm;
use ColdBolt\FileSystem\Writer;
use ColdBolt\AbstractController;
use ColdBolt\Template\Flashbag;

class BookingController extends AbstractController {

    private Flashbag $flashbag;

    public function index() {
        $this->flashbag = new Flashbag;

        if($this->request->hasContent('arrival')) {
            $this->handleBookingForm();
        }

        $this->render('booking', [
            'title' => 'Réservation | La Loire à vélo',
            'flashbag' => $this->flashbag
        ]);
    }

    public function handleBookingForm() {

        $form_data_file = $this->configuration->getDataDir() . DIRECTORY_SEPARATOR . 'data' . 'booking.txt';
        $form = new BookingForm($this->request->getContents());

        $form->validate();

        foreach($form->getErrors() as $error) {
            $this->flashbag->addFlash($error);
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