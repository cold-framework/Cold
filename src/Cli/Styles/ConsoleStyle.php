<?php

namespace ColdBolt\Cli\Styles;

class ConsoleStyle
{
    public function write(string $texte): void
    {
        fwrite(STDOUT, $texte);
    }

    public function writeln(string $texte): void
    {
        $this->write($texte . PHP_EOL);
    }

    public function succes(string $texte): void
    {
        if (Utils::support_color()) {
            $this->writeln(BackgroundColorStyle::COLOR['green'] . $texte . ResetStyle::RESET);
        } else {
            $this->writeln($texte);
        }
    }

    public function warning(string $texte): void
    {
        if (Utils::support_color()) {
            $this->writeln(BackgroundColorStyle::COLOR['yellow'] . $texte . ResetStyle::RESET);
        } else {
            $this->writeln($texte);
        }
    }

    public function error(string $texte): void
    {
        if (Utils::support_color()) {
            $this->writeln(BackgroundColorStyle::COLOR['red'] . $texte . ResetStyle::RESET);
        } else {
            $this->writeln($texte);
        }
    }
}
