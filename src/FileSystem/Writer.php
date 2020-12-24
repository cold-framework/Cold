<?php

namespace ColdBolt\FileSystem;

class Writer
{
    public static function write(string $file, string $content): void
    {
        file_put_contents($file, $content, FILE_APPEND);
    }
}
