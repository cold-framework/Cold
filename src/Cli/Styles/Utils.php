<?php

namespace ColdBolt\Cli\Styles;

use JetBrains\PhpStorm\Pure;

class Utils
{
    #[Pure] public static function support_color(): bool
    {
        if (!(PHP_OS === "WINNT" || PHP_OS === "Windows")) {
            return  posix_isatty(STDOUT);
        }

        return true;
    }
}
