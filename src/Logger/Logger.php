<?php

namespace ColdBolt\Logger;

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

    public function __construct(string $filename, string $folder, bool $debug = false)
    {
        $this->file = $folder . $filename;
        $this->debug = $debug;
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