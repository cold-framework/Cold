<?php

namespace App\Controller;

use ColdBolt\AbstractController;
use ColdBolt\Http\Response;

class ExempleController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('index', [
            'title' => 'Exemple Page'
        ]);
    }
}