<?php

namespace ColdBolt\Http;

/**
 * @internal
 */
class PutPolyfill
{
    public static function register()
    {
        parse_str(file_get_contents("php://input"), $_PUT);
        print_r(file_get_contents("php://input"));
        foreach ($_PUT as $key => $value) {
            unset($_PUT[$key]);

            $_PUT[str_replace('amp;', '', $key)] = $value;
        }

        $_REQUEST = array_merge($_REQUEST, $_PUT);
    }
}
