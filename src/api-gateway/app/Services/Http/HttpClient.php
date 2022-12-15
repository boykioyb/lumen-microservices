<?php
namespace App\Services\Http;

/**
 * Class HttpClient.
 */
abstract class HttpClient
{
    /**
     * @return HttpResponse
     */
    abstract public function getHttpResponse();

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     * @return mixed
     */
    public function sendRequest(HttpRequest $request)
    {
        list($url, $method, $headers, $params) = $this->prepareRequestOptions($request);

        $client = new \GuzzleHttp\Client();

        $data = [
            'http_errors' => false,
            'verify'      => false,
            'headers'     => $headers,
        ];

        if ($method == 'GET') {
            $data['query'] = $params;
        } else {
            $data['form_params'] = $params;
        }

        $response = $client->request($method, $url, $data);

        $httpResponse = app()->make($this->getHttpResponse());

        $httpResponse->setRequest($request);
        $httpResponse->setHttpStatusCode($response->getStatusCode());
        $httpResponse->setHeaders($response->getHeaders());
        $httpResponse->setBody($response->getBody()->getContents());

        return $httpResponse;
    }

    /**
     * @return array
     */
    protected function prepareRequestOptions(HttpRequest $request)
    {
        return [
            $request->getUrl(),
            $request->getMethod(),
            $request->getHeaders(),
            $request->getParams(),
        ];
    }
}
