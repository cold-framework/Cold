<?php

namespace ColdBolt\Logger;

use ColdBolt\Configuration;
use ColdBolt\FileSystem\Writer;

class Logger {

    private string $file;
    private bool $debug;

    const DATE_FORMAT = 'd-m-Y H:i:s';

    const DEBUG = 'DEBUG';
    const INFO = 'INFO';
    const WARN = 'WARN';
    const ERROR = 'ERROR';
    const FATAL = 'FATAL';

    public function __construct(Configuration $configuration, string $filename = "app.txt")
    {
        $this->file = $configuration->getDataDir() . 'logs' . DIRECTORY_SEPARATOR . $filename;
        $this->debug = $configuration->isDebug();
    }

    private function write(string $prefix, string $message) {
        Writer::write($this->file, sprintf('[' . $prefix .'] %s | ' . $message . \PHP_EOL, date(self::DATE_FORMAT)));
    }

    public function debug($message) {
        if($this->debug) {
            $this->write(self::DEBUG, $message);
        }
    }

    public function info($message) {
        $this->write(self::INFO, $message);
    }

    public function warn($message) {
        $this->write(self::WARN, $message);
    }

    public function error($message) {
        $this->write(self::ERROR, $message);
    }

    public function fatal($message) {
        $this->write(self::FATAL, $message);
    }
}