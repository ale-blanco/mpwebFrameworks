<?php

namespace MyApp\Component\Calculator;

class MultiplyOperation
{
    public function multiply(int $value1, int $value2): int
    {
        return $value1 * $value2;
    }
}
