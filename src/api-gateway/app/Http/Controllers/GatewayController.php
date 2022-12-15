<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GatewayController extends Controller
{

    public function handle($serviceName, Request $request)
    {
        try {
            $fullUrl = $request->path();
            [$serviceName] = explode('/', $serviceName);
            $url = substr($fullUrl, strrpos($fullUrl, $serviceName) + strlen($serviceName) + 1);
            $service = config('service.' . $serviceName . '.url') ?? null;

            if (!$service) {
                return response_error();
            }
            $method = $request->getMethod();
            $client = new Client([
                'timeout' => 60.0,
            ]);

            $fullUrl = $service . $url;
            $response = $responseData = null;
            switch ($method) {
                case 'GET':
                    $response = $client->request($method, $fullUrl, [
                        'query' => $request->all()
                    ]);
                    $responseData = json_decode($response->getBody());
                    break;
                case 'POST':
                    $response = $client->request($method, $fullUrl, [
                        'body' => $request->all()
                    ]);
                    $responseData = json_decode($response->getBody());
                    break;
                case 'PUT':
                case 'PATCH':
                    $response = $client->request($method, $fullUrl, [
                        'json' => $request->all()
                    ]);
                    $responseData = json_decode($response->getBody());
                    break;
            }

            return response()->json($responseData, $response->getStatusCode());
        } catch (\Exception $exception) {
            Log::error("[API-GATEWAY] error: ", [
                'trace' => $exception
            ]);
            return response_error();
        }
    }

}
