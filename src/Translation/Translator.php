<?php

namespace ColdBolt\Translation;

use ColdBolt\Configuration;
use ColdBolt\FileSystem\Reader;
use ColdBolt\Http\Session;

class Translator {

    private string $translation_dir;
    private Session $session;

    public function __construct(Configuration $configuration, Session $session)
    {
        $this->translation_dir = $configuration->getTranslationDir();
        $this->session = $session;
    }

    public function translate(string $string, ?string $group = null, $lang = null): string {

        if(null === $lang) {
            $lang = $this->session->get('lang');
        }

        $path = __DIR__ . '/../../' . $this->translation_dir . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR . ($group === null ? 'default': $group) . '.json';
        $file = Reader::read($path);

        $translation_file = json_decode($file, true);
        return ($translation_file[$string] === null ? $string : $translation_file[$string] );
    }
}