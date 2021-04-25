<?php


namespace ColdBolt\Configuration;


class Configuration
{

    protected array $cache = [];

    public function __construct(
        public $configuration_folder = __DIR__ . '/../../config/'
    ){}

    public function get(string $path): string | array
    {
        $filename = $this->get_filename_from_path($path);

        if (!isset($this->cache[$filename])) {
            $this->cache[$filename] = include $this->configuration_folder . $filename;
        }

        $configuration_value = $this->cache[$filename];
        $configuration_keys = explode('.', $path);
        unset($configuration_keys[0]);
        $configuration_keys = array_values($configuration_keys);

        foreach ($configuration_keys as $configuration_key) {
            if (!isset($configuration_value[$configuration_key])) {
                throw new KeyNotFoundException;
            }

            $configuration_value = $configuration_value[$configuration_key];
        }

        return $configuration_value;
    }

    public function has(string $path): bool
    {
        try {
            $this->get($path);
        } catch (KeyNotFoundException) {
            return false;
        }

        return true;
    }

    private function get_filename_from_path(string $path): string
    {
        return explode('.', $path)[0] . '.php';
    }
}
