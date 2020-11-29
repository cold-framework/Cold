<?php

namespace ColdBolt\Template;

use ColdBolt\Translation\Translator;

class Flashbag {

    private array $errors = [];
    private array $alerts = [];
    private array $infos = [];

    private Template $template;
    private Translator $translator;

    public function __construct(Translator $translator, Template $template) {
        $this->translator = $translator;
        $this->template = $template;
    }

    public function addError(string $message) {
        $this->errors[] = $message;
    }

    public function addAlert(string $message) {
        $this->alerts[] = $message;
    }

    public function addInfo(string $message) {
        $this->infos[] = $message;
    }

    public function formatError(): string {
        $content = "";
        $this->template->setTemplate('_flash/error');

        foreach ($this->errors as $error) {
		    $content .=  $this->template->render([
                'translated' => $this->translator->translate($error, 'constraint')
            ]);
        }
        
        return $content;
    }
}