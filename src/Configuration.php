<?php

namespace ColdBolt;


class Configuration
{

    protected array $cache = [];

    public function get(string $path): string | array
    {
        $filename = $this->get_filename_from_path($path);

        if (!isset($this->cache[$filename])) {
            $this->cache[$filename] = include __DIR__ . '/../config/' . $filename;
        }

        $configuration_value = $this->cache[$filename];
        $configuration_keys = explode('.', $path);
        unset($configuration_keys[0]);
        $configuration_keys = array_values($configuration_keys);

        foreach ($configuration_keys as $configuration_key) {
            $configuration_value = $configuration_value[$configuration_key];
        }

        return $configuration_value;
    }

    public function has(string $path): bool
    {
        return true;
    }

    private function get_filename_from_path(string $path): string
    {
        return explode('.', $path)[0] . '.php';
    }
}
