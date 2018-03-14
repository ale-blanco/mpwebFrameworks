<?php

namespace MyApp\Component\Calculator;

use MyApp\Component\Exception\DividerZeroNotValidException;

class DivideOperation
{
    public function divide(int $value1, int $value2): float
    {
        if ($value2 === 0) {
            throw new DividerZeroNotValidException();
        }
        return $value1 / $value2;
    }
}
