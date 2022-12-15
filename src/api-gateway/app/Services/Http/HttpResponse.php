<?php

namespace App\Services\Http;

/**
 * Class HttpResponse.
 */
class HttpResponse
{
    /**
     * @var HttpRequest the original request that returned this response
     */
    protected $request;

    /**
     * @var string the raw body of the response from Graph
     */
    protected $body;

    /**
     * @var int the HTTP status code response from Graph
     */
    protected $httpStatusCode;

    /**
     * @var array the headers returned from Graph
     */
    protected $headers;

    /**
     * @var array the decoded body of the Graph response
     */
    protected $decodedBody = [];

    /**
     * HttpResponse constructor.
     *
     * @param HttpRequest $request
     * @param string      $body
     * @param int         $httpStatusCode
     */
    public function __construct(HttpRequest $request = null, string $body = null, int $httpStatusCode = null, array $headers = [])
    {
        $this->request        = $request;
        $this->body           = $body;
        $this->httpStatusCode = $httpStatusCode;
        $this->headers        = $headers;
    }

    public function getRequest(): HttpRequest
    {
        return $this->request;
    }

    public function setRequest(HttpRequest $request): void
    {
        $this->request = $request;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;

        $this->setDecodedBody($this->body);
    }

    public function getHttpStatusCode(): int
    {
        return !empty($this->httpStatusCode) ? $this->httpStatusCode : -1;
    }

    public function setHttpStatusCode(int $httpStatusCode): void
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getDecodedBody(): array
    {
        return $this->decodedBody;
    }

    public function setDecodedBody($body): void
    {
        $decodedBody = json_decode($body);

        switch ($this->getHttpStatusCode()) {
            case HttpStatusCode::STATUS_OK:
                $this->decodedBody = [
                    'data' => $decodedBody,
                ];

                break;
            default:
                $this->decodedBody = [
                    'error' => [
                        'message' => $decodedBody,
                    ],
                ];
        }
    }

    /**
     * Returns true if returned an error message.
     *
     * @return bool
     */
    public function isError()
    {
        return isset($this->decodedBody['error']);
    }

    /**
     * @return null|mixed
     */
    public function getError()
    {
        if (!$this->isError()) {
            return null;
        }

        return $this->decodedBody['error'];
    }
}
