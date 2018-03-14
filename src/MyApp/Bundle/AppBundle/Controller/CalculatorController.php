<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\AddOperation;
use MyApp\Component\Calculator\DivideOperation;
use MyApp\Component\Calculator\MultiplyOperation;
use MyApp\Component\Calculator\SubOperation;
use MyApp\Component\Exception\DividerZeroNotValidException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CalculatorController
{

    public function addAction(Request $request): Response
    {
        $param1 = $request->request->get('param1');
        $param2 = $request->request->get('param2');
        if (!$this->validateNumber($param1) || !$this->validateNumber($param2)) {
            throw new HttpException(400,'Valores no validos');
        }

        $addOperation = new AddOperation();
        return new Response((int)$addOperation->add((int)$param1, (int)$param2));
    }

    public function subAction(string $param1, Request $request): Response
    {
        if (!$this->validateNumber($param1)) {
            throw new HttpException(404, 'Pagina no encontrada');
        }

        $param2 = $request->query->get('param2');
        if (!$this->validateNumber($param2)) {
            throw new HttpException(400,'Valores no validos');
        }

        $subOperation = new SubOperation();
        return new Response($subOperation->sub((int)$param1, (int)$param2));
    }

    public function multiplyAction(string $param1, Request $request): Response
    {
        if (!$this->validateNumber($param1)) {
            throw new HttpException(404, 'Pagina no encontrada');
        }

        $param2 = $request->request->get('param2');
        if (!$this->validateNumber($param2)) {
            throw new HttpException(400,'Valores no validos');
        }

        $mulOperation = new MultiplyOperation();
        return new Response($mulOperation->multiply((int)$param1, (int)$param2));
    }

    public function divideAction(Request $request): Response
    {
        $param1 = $request->query->get('param1');
        $param2 = $request->query->get('param2');
        if (!$this->validateNumber($param1) || !$this->validateNumber($param2)) {
            throw new HttpException(400,'Valores no validos');
        }

        $divOperation = new DivideOperation();
        try {
            return new Response($divOperation->divide((int)$param1, (int)$param2));
        } catch (DividerZeroNotValidException $ex) {
            throw new HttpException(400, $ex->getMessage());
        }
    }

    private function validateNumber($number): bool
    {
        return (filter_var($number, FILTER_VALIDATE_INT));
    }
}
