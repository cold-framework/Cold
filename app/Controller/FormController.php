<?php

namespace App\Controller;

use App\Models\Form\BookingForm;

use ColdBolt\FileSystem\Writer;
use ColdBolt\AbstractController;

class FormController extends AbstractController
{
    private BookingForm $form;

    public function index(): void
    {
        if ($this->request->hasContent('arrival')) {
            $this->form = new BookingForm($this->request->getContents());

            if (!empty($errors = $this->form->getErrors())) {
                $this->onError($errors);
            } else {
                $this->onSucess();
            }

            return;
        }

        $this->render('form/index', [
            'title' => 'Réservation | La Loire à vélo',
            'flashbag' => $this->flashbag->formatError()
        ]);
    }

    private function onSucess(): void
    {
        $content = $this->template->setTemplate('form/raw')->render([
            'form' => $this->form->getData(),
        ]);

        $this->render('form/sucess', [
            'title' => 'Réservation | La Loire à vélo',
            'form' => $this->form->getData(),
        ]);

        $form_data_file = $this->configuration->getDataDir() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'booking.txt';
        Writer::write($form_data_file, $content);
    }

    private function onError(array $errors): void
    {
        foreach ($errors as $error) {
            $this->flashbag->addError($error);
        }
    }
}
