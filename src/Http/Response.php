<?php

namespace ColdBolt\Http;

use ColdBolt\Http\Exceptions\HeaderNotFoundException;

class Response
{
    private int $HTTPCode = 200;
    private ?array $headers = null;
    private string $body = "";

    public function __construct()
    {
        // Empty Constructor
    }

    public function setHTTPCode(int $code): self
    {
        $this->HTTPCode = $code;
        return $this;
    }

    public function setHeader($key, $value): self
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function removeHeader($header): self
    {
        unset($this->headers[$header]);
        return $this;
    }

    public function hasHeader($header): bool
    {
        return isset($this->headers[$header]);
    }

    public function getHeader($header): string
    {
        if (!$this->hasHeader($header)) {
            throw new HeaderNotFoundException(sprintf("This header can't be found: %s", $header));
        }

        return $this->headers[$header];
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function write($body): void
    {
        $this->body = $body;
    }

    public function getHTTPCode(): int
    {
        return $this->HTTPCode;
    }

    public function send(): void
    {
        if ($this->headers !== null) {
            foreach ($this->headers as $key => $value) {
                header($key . ': ' . $value);
            }
        }

        http_response_code($this->HTTPCode);
        echo $this->body;
    }
}
