<?php

namespace MyApp\Component\Exception;

use Throwable;

class DividerZeroNotValidException extends \Exception
{
    public function __construct()
    {
        parent::__construct('El divisor no puede ser 0');
    }
}
