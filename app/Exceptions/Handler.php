<?php

namespace App\Exceptions;

use BadMethodCallException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (MethodNotAllowedHttpException $e) {
            return response()->json(['error' => 'Method Not Allowed', 'success' => false, 'message' => $e->getMessage()], SymfonyResponse::HTTP_METHOD_NOT_ALLOWED);
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return response()->json(['error' => 'Http NotFound', 'success' => false, 'message' => $e->getMessage()], SymfonyResponse::HTTP_NOT_FOUND);
        });

        // $this->renderable(function (UnauthorizedException $e) {
        //     return response()->json(['error' => 'You do not have the required authorization.', 'success' => false, 'message' => $e->getMessage()], 403);
        // });

        $this->renderable(function (BadMethodCallException $e) {
            return response()->json(['error' => 'Bad Method Call Exception', 'success' => false, 'message' => $e->getMessage()], 403);
        });
    }
}
