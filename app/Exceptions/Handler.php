<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if($request->wantsJson())
            {
                return response()->json(['message' => 'Страница не найдена'], 404);
            }
        });

        $this->renderable(function (ValidationException  $e, $request) {
            if($request->wantsJson())
            {
                return response()->json([
                    'message' => 'Указанные данные недействительны.',
                    'errors' => $e->validator->getMessageBag()], 422);
            }
        });
    }
}
