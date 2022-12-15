<?php

namespace App\Exceptions;

use App\Services\Http\HttpResponseErrorCode;

class ServiceException extends \RuntimeException
{
    private $errorCode;
    private $data;

    public function __construct($errorCode, $message = '', $code = 0, \Throwable $previous = null)
    {
        $message = empty($message) ? HttpResponseErrorCode::getErrorMessage($errorCode) : $message;
        parent::__construct($message, $code, $previous);
        $this->errorCode = $errorCode;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
