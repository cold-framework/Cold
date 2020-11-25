<?php

/**
* Simple autoloader, so we don't need Composer just for this.
*/
namespace ColdBolt;

require_once __DIR__ . '/../Utils/Str.php';
require_once __DIR__ . '/Exception/NamespaceNotFoundException.php';

use ColdBolt\Autoload\Exception\NamespaceNotFoundException;
use ColdBolt\Utils\Str;

class Autoloader
{
    public static function get_config()
    {
        return json_decode(file_get_contents(__DIR__ . '/../config.json'), true)['autoload'];
    }

    public static function register()
    {
        $config = Autoloader::get_config();

        spl_autoload_register(function ($class) use ($config) {
            $ns_path = null;

            foreach ($config['psr-4'] as $namespace => $path) {
                if (Str::str_starts_with($class, $namespace)) {
                    $ns_path = $path;
                    $class = str_replace($namespace, '', $class);
                }
            }

            if ($ns_path === null) {
                throw new NamespaceNotFoundException('This namespace isn\'t register: ' . $class);
            }

            $file = str_replace('\\', DIRECTORY_SEPARATOR, $ns_path . '\\' . $class).'.php';

            require_once __DIR__ . '/../' . $file;
        });
    }
}
