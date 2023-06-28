<?php

namespace Core\Http;

class Response
{
    private ?string $content = null;
    private ?int $statusCode = null;

    /**
     * @param string $content
     * @param int $statusCode
     */
    public function __construct(string $content = "", int $statusCode = 303)
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
    }

    public function __invoke(string $content = "",int $statusCode = 303):self
    {
        $this->setContent($content);
        $this->setStatusCode($statusCode);
        return $this->render();
    }


    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * the function for display content of response
     * @return $this
     */
    public function render():self
    {
        http_response_code($this->statusCode);
        echo $this->getContent();
        return $this;
    }
}