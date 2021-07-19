<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (ValidationFailedException $e) {
            $errors = [
                'errors' => $e->getErrors()
            ];

            return response()->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        });
    }
}
