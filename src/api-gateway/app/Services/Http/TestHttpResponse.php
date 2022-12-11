<?php

namespace App\Services\Http;

use App\Services\Graph\GraphTest;
use App\Services\Log\Log;

/**
 * Class TestHttpResponse.
 */
class TestHttpResponse extends HttpResponse
{
    /**
     * TestHttpResponse constructor.
     */
    public function __construct(HttpRequest $request = null, string $body = null, int $httpStatusCode = null, array $headers = [])
    {
        parent::__construct($request, $body, $httpStatusCode, $headers);
    }

    /**
     * @throws \Exception
     */
    public function setDecodedBody($body): void
    {
        $decodedBody = json_decode($body);

        $log = new Log('test');
        $log->info('Test HTTP Request Api', [
            'url'      => $this->getRequest()->getUrl(),
            'method'   => $this->getRequest()->getMethod(),
            'headers'  => $this->getRequest()->getHeaders(),
            'params'   => $this->getRequest()->getParams(),
            'response' => $this->getBody(),
        ]);

        switch ($this->getHttpStatusCode()) {
            case HttpStatusCode::STATUS_OK:
                $graphData = !empty($decodedBody->data) ? $decodedBody->data : null;

                $this->decodedBody = [
                    'data' => new GraphTest($graphData),
                ];

                break;
            case HttpStatusCode::STATUS_BAD_REQUEST:
            case HttpStatusCode::STATUS_UNPROCESSABLE_ENTITY:
                $errors    = [];
                $errorData = !empty($decodedBody->message) ? $decodedBody->message : [];
                foreach ($errorData as $key => $error) {
                    $errors[$key] = $error[0];
                }

                $this->decodedBody = [
                    'error' => [
                        'code'    => HttpResponseErrorCode::CODE_1002,
                        'message' => HttpResponseErrorCode::getErrorMessage(HttpResponseErrorCode::CODE_1002),
                        'errors'  => $errors,
                    ],
                ];

                break;
            default:
                $this->decodedBody = [
                    'error' => [
                        'code'    => HttpResponseErrorCode::CODE_1000,
                        'message' => HttpResponseErrorCode::getErrorMessage(HttpResponseErrorCode::CODE_1000),
                        'errors'  => [],
                    ],
                ];
        }
    }
}
