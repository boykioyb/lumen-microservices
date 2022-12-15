<?php

namespace App\Services\Http;

class HttpStatusCode
{
    /**
     * Successful.
     */
    public const STATUS_OK = 200;
    /**
     * Created.
     */
    public const STATUS_CREATED = 201;
    /**
     * Bad Request:
     * Bad input parameter. Error message should indicate which one and why.
     */
    public const STATUS_BAD_REQUEST = 400;
    /**
     * Unauthorized:
     * The client passed in the invalid Auth token. Client should refresh the token and then try again.
     */
    public const STATUS_UNAUTHORIZED = 401;
    /**
     * Forbidden:
     * Customer doesn’t exist.
     * Application not registered.
     * Application try to access to properties not belong to an App.
     * Application try to trash/purge root node.
     * Application try to update contentProperties.
     * Operation is blocked (for third-party apps).
     * Customer account over quota.
     */
    public const STATUS_FORBIDDEN = 403;
    /**
     * Not Found:
     * Resource not found.
     */
    public const STATUS_NOT_FOUND = 404;
    /**
     * Method Not Allowed:
     * The resource doesn't support the specified HTTP verb.
     */
    public const STATUS_METHOD_NOT_ALLOWED = 405;
    /**
     * Conflict:.
     */
    public const STATUS_CONFLICT = 409;
    /**
     * Length Required:
     * The Content-Length header was not specified.
     */
    public const STATUS_LENGTH_REQUIRED = 411;
    /**
     * Precondition Failed.
     */
    public const STATUS_PRECONDITION_FAILED = 412;
    /**
     * Unprocessable Entity Explained:
     * Validation Failed.
     */
    public const STATUS_UNPROCESSABLE_ENTITY = 422;
    /**
     * Too Many Requests:
     * Too many request for rate limiting.
     */
    public const STATUS_TOO_MANY_REQUESTS = 429;
    /**
     * Internal Server Error:
     * Servers are not working as expected. The request is probably valid but needs to be requested again later.
     */
    public const STATUS_INTERNAL_SERVER_ERROR = 500;
    /**
     * Service Unavailable.
     */
    public const STATUS_SERVICE_UNAVAILABLE = 503;
}
