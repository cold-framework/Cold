<?php

namespace App\Controller;

use ColdBolt\Routing\AbstractController;

class HomepageController extends AbstractController {

    public function index() {
        $this->render('index');
    }
}