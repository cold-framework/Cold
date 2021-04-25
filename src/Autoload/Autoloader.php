<?php


namespace ColdBolt;

require_once __DIR__ . '/Exception/NamespaceNotFoundException.php';
require_once __DIR__ . '/../Configuration.php';

use ColdBolt\Autoload\Exception\NamespaceNotFoundException;

class Autoloader
{

    public static function register(): void
    {
        $configuration = new Configuration();
        $dev_autoloader = $configuration
            ->get('framework.autoload-dev');

        $autoload = $configuration
            ->get('framework.autoload');

        if (isset($dev_autoloader['files'])) {
            foreach ($dev_autoloader['files'] as $file) {
                require_once __DIR__ . '/../../' . $file;
            }
        }

        if (isset($autoload['files'])) {
            foreach ($autoload['files'] as $file) {
                require_once __DIR__ . '/../../' . $file;
            }
        }

        spl_autoload_register(function ($class) use ($autoload, $dev_autoloader) {
            $ns_path = null;

            foreach ($dev_autoloader['psr-4'] as $namespace => $path) {
                if (str_starts_with($class, $namespace)) {
                    $ns_path = $path;
                    $class = str_replace($namespace, '', $class);
                    break;
                }
            }

            foreach ($autoload['psr-4'] as $namespace => $path) {
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
