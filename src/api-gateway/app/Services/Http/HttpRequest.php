<?php

namespace App\Services\Http;

/**
 * Class HttpRequest.
 */
class HttpRequest
{
    /**
     * @var string the HTTP method for this request
     */
    protected $method;

    /**
     * @var string the Url for this request
     */
    protected $url;

    /**
     * @var array the headers to send with this request
     */
    protected $headers = [];

    /**
     * @var array the parameters to send with this request
     */
    protected $params = [];

    /**
     * HttpRequest constructor.
     */
    public function __construct(string $url = '', string $method = '', array $headers = [], array $params = [])
    {
        $this->setUrl($url);
        $this->setMethod($method);
        $this->setParams($params);
        $this->setHeaders($headers);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}
