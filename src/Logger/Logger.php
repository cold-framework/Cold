<?php

namespace ColdBolt\Logger;

use ColdBolt\Configuration;
use ColdBolt\FileSystem\Writer;

class Logger {

    private string $file;
    private bool $debug;

    private const DATE_FORMAT = 'd-m-Y H:i:s';

    private const DEBUG = 'DEBUG';
    private const INFO = 'INFO';
    private const WARN = 'WARN';
    private const ERROR = 'ERROR';
    private const FATAL = 'FATAL';

    public function __construct(Configuration $configuration, string $filename = "app.txt")
    {
        $this->file = $configuration->getDataDir() . 'logs' . DIRECTORY_SEPARATOR . $filename;
        $this->debug = $configuration->isDebug();
    }

    private function write(string $prefix, string $message): void
    {
        Writer::write($this->file, sprintf('[' . $prefix .'] %s | ' . $message . \PHP_EOL, date(self::DATE_FORMAT)));
    }

    public function debug($message): void
    {
        if($this->debug) {
            $this->write(self::DEBUG, $message);
        }
    }

    public function info($message): void
    {
        $this->write(self::INFO, $message);
    }

    public function warn($message): void
    {
        $this->write(self::WARN, $message);
    }

    public function error($message): void
    {
        $this->write(self::ERROR, $message);
    }

    public function fatal($message): void
    {
        $this->write(self::FATAL, $message);
    }
}