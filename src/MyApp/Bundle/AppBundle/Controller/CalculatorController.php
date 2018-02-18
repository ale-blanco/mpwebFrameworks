<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\AddOperation;
use MyApp\Component\Calculator\DivideOperation;
use MyApp\Component\Calculator\MultiplyOperation;
use MyApp\Component\Calculator\SubOperation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController
{

    public function addAction(Request $request): Response
    {
        $param1 = $request->request->get('param1');
        $param2 = $request->request->get('param2');
        if (!$this->validateNumber($param1) || !$this->validateNumber($param2)) {
            throw new \Exception('Valores no validos');
        }

        $addOperation = new AddOperation();
        return new Response((int)$addOperation->add((int)$param1, (int)$param2));
    }

    public function subAction(string $param1, Request $request): Response
    {
        $param2 = $request->query->get('param2');
        if (!$this->validateNumber($param2)) {
            throw new \Exception('Valores no validos');
        }

        $subOperation = new SubOperation();
        return new Response($subOperation->sub((int)$param1, (int)$param2));
    }

    public function multiplyAction(string $param1, Request $request): Response
    {
        $param2 = $request->request->get('param2');
        if (!$this->validateNumber($param2)) {
            throw new \Exception('Valores no validos');
        }

        $mulOperation = new MultiplyOperation();
        return new Response($mulOperation->multiply((int)$param1, (int)$param2));
    }

    public function divideAction(Request $request)
    {
        $param1 = $request->query->get('param1');
        $param2 = $request->query->get('param2');
        if (!$this->validateNumber($param1) || !$this->validateNumber($param2)) {
            throw new \Exception('Valores no validos');
        }

        $divOperation = new DivideOperation();
        return new Response($divOperation->divide((int)$param1, (int)$param2));
    }

    private function validateNumber($number): bool
    {
        return (preg_match('/^[0-9]+$/', $number));
    }
}