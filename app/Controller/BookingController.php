<?php

namespace App\Controller;

use ColdBolt\Routing\AbstractController;

class BookingController extends AbstractController {

    public function index() {
        $this->render('booking');
    }
}