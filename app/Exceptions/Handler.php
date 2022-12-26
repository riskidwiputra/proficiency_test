<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'status'    => false,
                'message'   => Lang::get('exeptions.not_allowed')
            ], 400);
        }
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'status'    => false,
                'message'   => Lang::get('exeptions.model_not_found')
            ], 404);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'status'    => false,
                'message'   => Lang::get('exeptions.http_not_found')
            ], 404);
        }
        if ($exception instanceof ValidationException) {
            return response()->json([
                'status'  => false,
                'message' => Lang::get('exeptions.validation'),
                'errors' => $exception->validator->getMessageBag()
            ], 422); //type your error code.
        }

        return parent::render($request, $exception);
    }
}
