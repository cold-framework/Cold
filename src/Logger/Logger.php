<?php

namespace ColdBolt\Logger;

use ColdBolt\Configuration;
use ColdBolt\FileSystem\Writer;

class Logger {

    private string $file;
    private int $log_level;

    private const DATE_FORMAT = 'd-m-Y H:i:s';

    private const TRACE = [
        'name' => 'TRACE',
        'weight' => 1
    ];

    private const DEBUG = [
        'name' => 'DEBUG',
        'weight' => 2
    ];

    private const INFO = [
        'name' => 'INFO',
        'weight' => 3
    ];

    private const WARN = [
        'name' => 'WARN',
        'weight' => 4
    ];

    private const ERROR = [
        'name' => 'ERROR',
        'weight' => 5
    ];

    private const FATAL = [
        'name' => 'FATAL',
        'weight' => 6
    ];

    public function __construct(Configuration $configuration, string $filename = "app.txt")
    {
        $this->file = $configuration->get('framework.data') . 'logs' . DIRECTORY_SEPARATOR . $filename;

        $this->log_level = match ($configuration->get('framework.log_level')) {
            self::TRACE['name'] => self::TRACE['weight'],
            self::DEBUG['name'] => self::DEBUG['weight'],
            self::INFO['name'] => self::INFO['weight'],
            self::WARN['name'] => self::WARN['weight'],
            self::ERROR['name'] => self::ERROR['weight'],
            self::FATAL['name'] => self::FATAL['weight'],
        };
    }

    private function write(string $prefix, string $message): void
    {
        Writer::write($this->file, sprintf('[' . $prefix .'] %s | ' . $message . \PHP_EOL, date(self::DATE_FORMAT)));
    }

    public function trace($message): void
    {
        if(self::TRACE['weight'] <= $this->log_level) {
            $this->write(self::TRACE['name'], $message);
        }
    }

    public function debug($message): void
    {
        if(self::DEBUG['weight'] <= $this->log_level) {
            $this->write(self::DEBUG['name'], $message);
        }
    }

    public function info($message): void
    {
        if(self::INFO['weight'] <= $this->log_level) {
            $this->write(self::INFO['name'], $message);
        }
    }

    public function warn($message): void
    {
        if(self::WARN['weight'] <= $this->log_level) {
            $this->write(self::WARN['name'], $message);
        }
    }

    public function error($message): void
    {
        if(self::ERROR['weight'] <= $this->log_level) {
            $this->write(self::ERROR['name'], $message);
        }
    }

    public function fatal($message): void
    {
        if(self::FATAL['weight'] <= $this->log_level) {
            $this->write(self::FATAL['name'], $message);
        }
    }
}