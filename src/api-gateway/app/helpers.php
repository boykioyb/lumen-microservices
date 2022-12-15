<?php
if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param string $path
     * @return string
     */
    function config_path(string $path = ''): string
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('response_success')) {
    /**
     * @param mixed $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function response_success($data = [], string $message = null, array $extraData = [])
    {
        $responseData = [
            'success' => true,
            'message' => !empty($message) ? $message : trans('global.success'),
            'data'    => !empty($data) ? $data : new stdClass(),
        ];

        $responseData = array_merge($responseData, $extraData);

        return response()->json($responseData);
    }
}

if (!function_exists('response_error')) {
    /**
     * @param int $httpStatusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function response_error(int $errorCode = 1000, string $message = null, array $errors = [], array $extraData = [], $httpStatusCode = 200)
    {
        $responseData = [
            'success' => false,
            'error'   => [
                'code'    => $errorCode,
                'message' => !empty($message) ? $message : \App\Services\Http\HttpResponseErrorCode::getErrorMessage($errorCode),
                'errors'  => $errors,
            ],
        ];

        $responseData = array_merge($responseData, $extraData);

        return response()->json($responseData, $httpStatusCode);
    }
}

if (!function_exists('format_datetime')){
    function format_datetime($datetime, $format = 'Y-m-d H:i:s'){
        return \Carbon\Carbon::parse($datetime)->format($format);
    }
}
