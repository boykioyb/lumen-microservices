<?php

namespace App\Services\Http;

/**
 * Class TestHttpRequest.
 */
class TestHttpRequest extends HttpRequest
{
    /**
     * TestHttpRequest constructor.
     */
    public function __construct(string $url = null, string $method = null, array $headers = [], array $params = [])
    {
        parent::__construct($url, $method, $headers, $params);
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = array_merge($headers, [
            'Token' => md5(json_encode($this->getParams())),
        ]);
    }
}
