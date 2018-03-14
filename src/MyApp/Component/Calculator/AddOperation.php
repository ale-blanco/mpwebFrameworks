<?php

namespace MyApp\Component\Calculator;

class AddOperation
{
    public function add(int $v1, int $v2): int
    {
        return $v1 + $v2;
    }
}
