<?php

namespace ColdBolt\Cli\Styles;

class ConsoleStyle
{
    public function write(string $texte)
    {
        fwrite(STDOUT, $texte);
    }

    public function writeln(string $texte)
    {
        fwrite(STDOUT, $texte . PHP_EOL);
    }

    public function succes(string $texte)
    {
        fwrite(STDOUT, BackgroundColorStyle::COLOR['green'] . $texte . ResetStyle::RESET . PHP_EOL);
    }

    public function warning(string $texte)
    {
        fwrite(STDOUT, BackgroundColorStyle::COLOR['yellow'] . $texte . ResetStyle::RESET . PHP_EOL);
    }

    public function error(string $texte)
    {
        fwrite(STDOUT, BackgroundColorStyle::COLOR['red'] . $texte . ResetStyle::RESET . PHP_EOL);
    }
}
