<?php

namespace App\Controller;

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

        $date = date('d-m-Y H:i:s');
        $arrival = $this->request->getContent('arival');
        $departure = $this->request->getContent('departure');
        $adult = $this->request->getContent('adult');
        $child = $this->request->getContent('child');
        $name = $this->request->getContent('name');
        $surname = $this->request->getContent('surname');
        $email = $this->request->getContent('email');
        $phone = $this->request->getContent('phone');
        $city = $this->request->getContent('city');
        $postal_code = $this->request->getContent('postal_code');

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