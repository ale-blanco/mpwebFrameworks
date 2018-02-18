<?php

namespace MyApp\Component\Calculator;

class DivideOperation
{
    public function divide(int $value1, int $value2): float
    {
        if ($value2 === 0) {
            throw new \Exception('El divisor no puede ser 0');
        }
        return $value1 / $value2;
    }
}
