<?php

namespace MyApp\Component\Calculator;

class SubOperation
{
    public function sub(int $value1, int $value2): int
    {
        return $value1 - $value2;
    }
}
