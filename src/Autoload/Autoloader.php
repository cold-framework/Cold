<?php


namespace ColdBolt;

require_once __DIR__ . '/Exception/NamespaceNotFoundException.php';

use ColdBolt\Autoload\Exception\NamespaceNotFoundException;

class Autoloader
{
    public static function get_config()
    {
        try {
            return json_decode(file_get_contents(__DIR__ . '/../../config.json'), true, 512, JSON_THROW_ON_ERROR)['autoload'];
        } catch (\JsonException $e) {
            exit(1);
        }
    }

    public static function register(): void
    {
        $config = self::get_config();

        foreach ($config['files'] as $file) {
            require_once __DIR__ . '/../../' . $file;
        }

        spl_autoload_register(function ($class) use ($config) {
            $ns_path = null;

            foreach ($config['psr-4'] as $namespace => $path) {
                if (str_starts_with($class, $namespace)) {
                    $ns_path = $path;
                    $class = str_replace($namespace, '', $class);
                    break;
                }
            }

            if ($ns_path === null) {
                throw new NamespaceNotFoundException('This namespace isn\'t register: ' . $class);
            }

            $file = str_replace('\\', DIRECTORY_SEPARATOR, $ns_path . '\\' . $class) . '.php';
            require_once __DIR__ . '/../../' . $file;
        });
    }
}
