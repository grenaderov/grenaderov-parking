<?php

namespace App;

use Throwable;

class ApiException extends \RuntimeException
{
    public function __construct(Throwable $prev = null)
    {
        $this->message = 'Ошибка API: ' . $prev->getMessage();
        $this->previous = $prev;

        parent::__construct($prev->getMessage(), $prev->getCode(), $prev);
    }
}