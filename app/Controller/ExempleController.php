<?php

namespace App\Controller;

use ColdBolt\AbstractController;

class ExempleController extends AbstractController {

    public function index() {
        $this->render('index', [
            'title' => 'Exemple Page'
        ]);
    }
}