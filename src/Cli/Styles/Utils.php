<?php

namespace ColdBolt\Cli\Styles;

class Utils
{
    public static function support_color(): bool
    {
        if (!(PHP_OS == "WINNT" || PHP_OS == "Windows")) {
            return  posix_isatty(STDOUT);
        }

        return true;
    }
}
