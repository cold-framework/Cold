<?php

namespace ColdBolt\FileSystem;

class Reader {
    public static function read(string $file): bool|string
    {
        return file_get_contents($file);
    }
}