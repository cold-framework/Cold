<?php

namespace App\Controller;

use App\Models\Form\BookingForm;
use ColdBolt\FileSystem\Writer;
use ColdBolt\AbstractController;

class BookingController extends AbstractController {

    public function index() {
        if($this->request->hasContent('arival')) {
            $this->handleBookingForm();
        }

        $this->render('booking');
    }

    public function handleBookingForm() {

        $form_data_file = $this->configuration->getDataDir() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'booking.txt';
        $form = new BookingForm($this->request->getContents());

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