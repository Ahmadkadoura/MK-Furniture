<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $exception)
    {
        if ($this->shouldReport($exception)) {
            // Log to the Telegram channel
            Log::channel('telegram')->error("Exception Message: {$exception->getMessage()}\n" .
                "Code: {$exception->getCode()}\n" .
                "File: {$exception->getFile()}\n" .
                "Line: {$exception->getLine()}");
        }

        parent::report($exception);
    }
}
