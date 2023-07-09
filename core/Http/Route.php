<?php

namespace Core\Http;

use Attribute;

#[Attribute]
final class Route
{
    private string $name;
    private string $path;
    private string|array $method;

    /**
     * @param string $name
     * @param string $path
     * @param string|array $method
     */
    public function __construct(string $name, string $path, string|array $method="GET")
    {
        $this->name = $name;
        $this->path = $path;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array|string
     */
    public function getMethod(): array|string
    {
        return $this->method;
    }
}