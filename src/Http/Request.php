<?php

namespace ColdBolt\Http;

use ColdBolt\Http\Exceptions\QueryNotFoundException;
use ColdBolt\Http\Exceptions\CookieNotFoundException;
use ColdBolt\Http\Exceptions\HeaderNotFoundException;
use ColdBolt\Http\Exceptions\ContentNotFoundException;

/**
 * Represent the request
 * Be aware, to get the body, it's working only on POST
 */
class Request
{
    private array $queries;
    private array $contents;
    private array $cookies;
    private array $headers;
    private string $method;
    private array $server;
    private string $ip;
    private string $uri;
    
    public function __construct($get, $post, $files, $cookies, $server)
    {
        $this->queries = $get;
        $this->contents = array_merge($post, $files);
        $this->cookies = $cookies;
        $this->server = $server;
        $this->method = $this->server['REQUEST_METHOD'];
        $this->ip = $this->server['REMOTE_ADDR'];
        $this->uri = strtok($this->server['REQUEST_URI'], '?');
        $this->headers = getallheaders();
    }

    public function getHeader(string $header): string
    {
        if (!$this->hasHeader($header)) {
            throw new HeaderNotFoundException(sprintf("This header can't be found: %s", $header));
        }

        return $this->headers[$header];
    }

    public function hasHeader(string $header): bool
    {
        return isset($this->headers[$header]);
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getContents(): array
    {
        return $this->contents;
    }

    public function hasContent(string $content): bool
    {
        return isset($this->contents[$content]);
    }

    public function getContent(string $content): string
    {
        if (!$this->hasContent($content)) {
            throw new ContentNotFoundException(sprintf("This content key can't be found: %s", $content));
        }

        return $this->contents[$content];
    }

    public function getQueries(): array
    {
        return $this->queries;
    }

    public function hasQuery(string $query): bool
    {
        return isset($this->queries[$query]);
    }

    public function getQuery(string $query): string
    {
        if (!$this->hasQuery($query)) {
            throw new QueryNotFoundException(sprintf("This query parameter can't be found: %s", $query));
        }

        return $this->queries[$query];
    }

    public function getCookies(): array
    {
        return $this->cookies;
    }

    public function getCookie($cookie): string
    {
        if (!$this->hasCookie($cookie)) {
            throw new CookieNotFoundException(sprintf("This cookie can't be found: %s", $cookie));
        }

        return $this->cookies[$cookie];
    }

    public function hasCookie(string $cookie): bool
    {
        return isset($this->cookies[$cookie]);
    }

    public function getIP(): string
    {
        return $this->ip;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getURI(): string
    {
        return $this->uri;
    }
    
    public static function createFromGlobals(): Request
    {
        return new Request($_GET, $_POST, $_FILES, $_COOKIE, $_SERVER);
    }
}
