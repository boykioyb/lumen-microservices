<?php

namespace App\Services\Http;

/**
 * Class TestHttpClient.
 */
class TestHttpClient extends HttpClient
{
    /**
     * @var string
     */
    private $baseUrl;
    /**
     * @var string
     */
    private $apiKey;

    /**
     * TestHttpClient constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->baseUrl = 'https://dev-notice.9pay.mobi';
        $this->apiKey  = 'VjMEgQGtME55zyda5JjiYDlcwec7oBa9';
    }

    /**
     * @return mixed|string
     */
    public function getHttpResponse()
    {
        return TestHttpResponse::class;
    }

    /**
     * @param int $expired
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     * @return TestHttpResponse
     */
    public function sendOTP($requestId, $phone, $body, $expired = 5)
    {
        $url = $this->baseUrl . '/api/sendOTP?api_key=' . $this->apiKey;

        $params = [
            'request_id' => $requestId,
            'phone'      => $phone,
            'body'       => $body,
            'expired'    => $expired,
        ];

        $httpRequest = new TestHttpRequest($url, 'POST', [], $params);

        /**
         * @var \App\Services\Http\TestHttpResponse $data
         */
        $data = $this->sendRequest($httpRequest);

        return $data;
    }
}
