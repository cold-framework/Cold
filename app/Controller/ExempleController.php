<?php

namespace App\Controller;

use ColdBolt\AbstractController;

class ExempleController extends AbstractController {

    public function index(): void
    {
        $this->render('index', [
            'title' => 'Exemple Page'
        ]);
    }
}