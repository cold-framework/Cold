<?php

namespace App\Controller;

use ColdBolt\AbstractController;

class HomepageController extends AbstractController {

    public function index() {
        $this->render('index', [
            'title' => 'Homepage'
        ]);
    }
}