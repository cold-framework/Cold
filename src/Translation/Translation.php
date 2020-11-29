<?php

namespace ColdBolt\Translation;

use ColdBolt\Configuration;

class Translation {

    private Configuration $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function translate(string $string, ?string $group = null, $lang = "fr_FR"): string {
        return "";
    }
}