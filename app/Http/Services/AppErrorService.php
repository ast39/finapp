<?php

namespace App\Http\Services;

/**
 * Ошибки приложения
 */
class AppErrorService {

    public int $code;

    public string $message;

    public ?string $error;


    public function __construct(int $code, string $message, ?string $error = null)
    {
        $this->code = $code;
        $this->error = $error;
        $this->message = $message;
    }

}
