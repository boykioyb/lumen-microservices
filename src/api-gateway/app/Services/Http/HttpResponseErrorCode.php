<?php

namespace App\Services\Http;

/**
 * Class HttpResponseErrorCode.
 */
class HttpResponseErrorCode
{
    /**
     * 10XX: Main App Errors.
     */
    public const CODE_1000 = 1000; // App Server Error, please contact the admin
    public const CODE_1001 = 1001; // Missing Headers
    public const CODE_1002 = 1002; // Missing Parameters
    public const CODE_1003 = 1003; // Invalid offset or limit
    public const CODE_1004 = 1004; // Invalid Locale
    public const CODE_1005 = 1005; // Invalid Timezone
    public const CODE_1006 = 1006; // You exceeded the limit of requests per minute, Please try again after sometime.
    public const CODE_1009 = 1009; // Request has been blocked
    public const CODE_1010 = 1010; // Bank info fail
    public const CODE_1011 = 1011; // Bank info fail
    public const CODE_1012 = 1012; // Missing Parameters.

    // dialog hợp lý

    /**
     * @return mixed|string
     */
    public static function getErrorMessage($errorCode)
    {
        $errorCodes = static::getErrors();

        return !empty($errorCodes[$errorCode]) ? $errorCodes[$errorCode] : 'Unknown';
    }

    /**
     * @param array $params
     *
     * @return null|array|string
     */
    public static function getErrorMessageTrans($message, $params = [])
    {
        return __('error.' . $message, $params);
    }

    /**
     * @return array
     */
    public static function getErrors()
    {
        return [
            static::CODE_1000 => static::getErrorMessageTrans(static::CODE_1000),
            static::CODE_1001 => static::getErrorMessageTrans(static::CODE_1001),
            static::CODE_1002 => static::getErrorMessageTrans(static::CODE_1002),
            static::CODE_1003 => static::getErrorMessageTrans(static::CODE_1003),
            static::CODE_1004 => static::getErrorMessageTrans(static::CODE_1004),
            static::CODE_1005 => static::getErrorMessageTrans(static::CODE_1005),
            static::CODE_1006 => static::getErrorMessageTrans(static::CODE_1006),
            static::CODE_1009 => static::getErrorMessageTrans(static::CODE_1009),
            static::CODE_1010 => static::getErrorMessageTrans(static::CODE_1010),
            static::CODE_1011 => static::getErrorMessageTrans(static::CODE_1011),
            static::CODE_1012 => static::getErrorMessageTrans(static::CODE_1012),
        ];
    }
}
