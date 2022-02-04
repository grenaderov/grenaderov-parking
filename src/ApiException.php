<?php

namespace App;

use Throwable;

class ApiException extends \RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = 'Ошибка API: ' . $message;
        $this->previous = $previous;

        parent::__construct($message, $code, $previous);
    }
}