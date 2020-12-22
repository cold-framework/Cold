<?php

namespace ColdBolt\Cli\Styles;

class BackgroundColorStyle implements StylableString
{
    const COLOR = [
        "black" => "\033[40m",
        "white" => "\e[107m",
        "red" => "\033[41m",
        "green" => "\033[42m",
        "yellow" => "\033[43m",
        "blue" => "\033[44m",
        "magenta" => "\033[45m",
        "cyan" => "\033[46m",
        "light_gray" => "\033[47m",
    ];
}
