<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        ServiceException::class,
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if ($exception instanceof OAuthServerException || $exception instanceof AuthenticationException) {
            return;
        }

        if (!config('app.debug')) {
            if (empty($exception->getTrace())) {
                parent::report($exception);
            }
            if (!isset($exception->getTrace()[0]) || !isset($exception->getTrace()[0]['line'])) {
                parent::report($exception);
            }
            $mesError = '[' . $exception->getCode() . '] "' . $exception->getMessage();
            if (isset($exception->getTrace()[0]['line'])) {
                $mesError .= '" on line ' . $exception->getTrace()[0]['line'];
            }
            if (isset($exception->getTrace()[0]['file'])) {
                $mesError .= ' of file ' . $exception->getTrace()[0]['file'];
            }
            Log::error($mesError . $exception->getTraceAsString());
        } else {
            parent::report($exception);
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            Log::warning('Method is not allowed line 93: ' . $request->fullUrl() . ' params: ' . json_encode($request->all()) . ' ip: ' .  $request->ip() . ' user_agent ' . $request->userAgent() . ' header: ' . json_encode($request->headers->all()));

            return response_error(HttpResponseErrorCode::CODE_1200);
        }

        if ($exception instanceof RouteNotFoundException) {
            return response_error(HttpResponseErrorCode::CODE_1200, null, [], [], HttpStatusCode::STATUS_UNAUTHORIZED);
        }

        if ($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException) {
            Log::warning('Method is not allowed line 103: ' . $request->fullUrl() . ' params: ' . json_encode($request->all()) . ' ip: ' .  $request->ip() . ' user_agent ' . $request->userAgent() . ' header: ' . json_encode($request->headers->all()));

            return response_error(HttpResponseErrorCode::CODE_1104);
        }

        if ($exception instanceof MissingScopeException) {
            Log::warning('Missing Scope line 109: ' . $request->fullUrl() . ' user_id: ' . iam()->id . ' params: ' .
                json_encode($request->all()) . ' ip: ' .  $request->ip() . ' user_agent ' . $request->userAgent() . ' header: ' . json_encode($request->headers->all()));

            return response_error(HttpResponseErrorCode::CODE_1101);
        }

        if ($exception instanceof AuthenticationException || $exception instanceof OAuthServerException) {
            return response_error(HttpResponseErrorCode::CODE_1200, null, [], [], HttpStatusCode::STATUS_UNAUTHORIZED);
        }

        if ($exception instanceof ServiceException) {
            if (!is_null($exception->getData())) {
                return response_error($exception->getErrorCode(), $exception->getMessage(), [], ['data' => $exception->getData()]);
            }

            return response_error($exception->getErrorCode(), $exception->getMessage());
        }

        return response_error(HttpResponseErrorCode::CODE_1000, null, [
            'traces' => get_class($exception),
        ], [], HttpStatusCode::STATUS_INTERNAL_SERVER_ERROR);
    }

}
