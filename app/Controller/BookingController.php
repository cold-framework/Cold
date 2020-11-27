<?php

namespace App\Controller;

use ColdBolt\FileSystem\Writer;
use ColdBolt\Routing\AbstractController;

class BookingController extends AbstractController {

    public function index() {
        $form_data_file = $this->configuration->getDataDir() . 'logs.txt';
        Writer::write($form_data_file, '+1');

        $this->render('booking');
    }
}