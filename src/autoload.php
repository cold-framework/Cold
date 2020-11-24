<?php

/**
* Simple autoloader, so we don't need Composer just for this.
*/
class Autoloader
{
    public static function get_config()
    {
        return json_decode(file_get_contents(__DIR__ . '/../autoload.json'), true);
    }

    public static function register()
    {
        $config = Autoloader::get_config();

        spl_autoload_register(function ($class) use ($config) {
            $ns_path = null;

            foreach ($config['psr-4'] as $namespace => $path) {
                if (Autoloader::str_starts_with($class, $namespace)) {
                    $ns_path = $path;
                    $class = str_replace($namespace, '', $class);
                }
            }

            if ($ns_path === null) {
                throw new Exception('This namespace isn\'t register');
            }
            //class_exists($className)

            $file = str_replace('\\', DIRECTORY_SEPARATOR, $ns_path . '\\' . $class).'.php';

            require_once __DIR__ . '/../' . $file;
        });
    }

    public static function str_starts_with(string $haystack, string $needle): bool
    {
        return 0 === \strncmp($haystack, $needle, \strlen($needle));
    }

    public static function str_ends_with(string $haystack, string $needle): bool
    {
        return '' === $needle || ('' !== $haystack && 0 === \substr_compare($haystack, $needle, -\strlen($needle)));
    }
}
