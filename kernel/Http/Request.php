<?php

declare(strict_types=1);

namespace Tarifficator\Kernel\Http;

class Request
{
    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $files,
        public readonly array $headers,
        public readonly array $cookies,
        public readonly array $server
    )
    {
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, static::getPost(), $_FILES, getallheaders(), $_COOKIE, $_SERVER);
    }

    private static function getPost(): array
    {
        return (!empty($_POST)) ? $_POST : json_decode(file_get_contents('php://input'), true) ?? [];
    }

    public function uri(): string
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function input(string $key, $default = null): mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }
}
