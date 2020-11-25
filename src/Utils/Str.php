<?php

namespace ColdBolt\Utils;

class Str
{
    public static function str_starts_with(string $haystack, string $needle): bool
    {
        return 0 === \strncmp($haystack, $needle, \strlen($needle));
    }

    public static function str_ends_with(string $haystack, string $needle): bool
    {
        return '' === $needle || ('' !== $haystack && 0 === \substr_compare($haystack, $needle, -\strlen($needle)));
    }
}
