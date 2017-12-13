<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException ||
                $exception instanceof NotFoundHttpException) {
            return response()->json([
                'message' => '404 Resource not found',
                'code' => JsonResponse::HTTP_NOT_FOUND
            ], JsonResponse::HTTP_NOT_FOUND);
        }

        if ($exception instanceof AccessDeniedException) {
            return response()->json([
                'message' => '401 Unauthorized',
                'code' => JsonResponse::HTTP_UNAUTHORIZED,
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof QueryException) {
            return response()->json([
                'message' => '400 Bad request',
                'code' => JsonResponse::HTTP_BAD_REQUEST,
                'description' => $exception->errorInfo
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        return parent::render($request, $exception);
    }
}
