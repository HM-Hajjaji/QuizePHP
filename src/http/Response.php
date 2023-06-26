<?php

namespace App\http;

class Response
{
    private $statusCode;
    private $body;

    public function __construct($body,$statusCode = 303,) {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    public function getBody() {
        return $this->body;
    }
    public function setBody($body) {
        $this->body = $body;
    }

    public function send():self {
        http_response_code($this->statusCode);
        echo $this->body;
        return $this;
    }
}