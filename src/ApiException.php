<?php

namespace App;

use Throwable;

class ApiException extends \RuntimeException
{
    public function __construct(Throwable $prev = null)
    {
        parent::__construct('Ошибка API: ' . $prev->getMessage(), $prev->getCode(), $prev);
    }
}