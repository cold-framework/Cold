<?php

namespace ColdBolt\Cli\Styles;

class ConsoleStyle
{
    public function newLine(): void
    {
        $this->write(PHP_EOL);
    }

    public function write(string $text): void
    {
        fwrite(STDOUT, $text);
    }

    public function writeln(string $text): void
    {
        $this->write($text . PHP_EOL);
    }

    public function succes(string $text): void
    {
        if (Utils::support_color()) {
            $this->writeln(BackgroundColorStyle::COLOR['green'] . $text . ResetStyle::RESET);
        } else {
            $this->writeln($text);
        }
    }

    public function warning(string $text): void
    {
        if (Utils::support_color()) {
            $this->writeln(BackgroundColorStyle::COLOR['yellow'] . $text . ResetStyle::RESET);
        } else {
            $this->writeln($text);
        }
    }

    public function error(string $text): void
    {
        if (Utils::support_color()) {
            $this->writeln(BackgroundColorStyle::COLOR['red'] . $text . ResetStyle::RESET);
        } else {
            $this->writeln($text);
        }
    }
}
