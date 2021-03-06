<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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

        $this->renderable(function (Throwable $e){
            if (request()->expectsJson()){

                if ($e instanceof ValidationException){
                    return response()->json([
                        'status' => 'fail',
                        'code' => $e->getCode(),
                        'data' => $e->errors(),
                    ], 422);
                }elseif (!$e instanceof AuthenticationException){
                    return response()->json([
                        'status' => 'error',
                        'message' => $e->getMessage(),
                        'code' => $e->getStatusCode()
                    ], $e->getStatusCode());
                }
            }
        });
    }
}
