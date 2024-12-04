<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            // Menangani kesalahan 404 atau 500 secara spesifik
            if ($exception->getStatusCode() == 404) {
                return response()->view('errors.404', [], 404);
            }

            if ($exception->getStatusCode() == 500) {
                return response()->view('errors.500', [], 500);
            }
        }

        // Tangani pengecualian lain (non-HTTP)
        return parent::render($request, $exception);
    }
}
