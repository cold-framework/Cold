<?php

namespace ColdBolt\Http;

class Session {

    public function __construct()
    {
        session_start();
    }

    public function get(string $key) {
        return $_SESSION[$key];
    }

    public function set(string $key, $data): self {
        $_SESSION[$key] = $data;

        return $this;
    }

    public function remove(string $key): self {
        unset($_SESSION[$key]);
        return $this;
    }
}