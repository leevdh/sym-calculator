<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Calculator as CalculatorService;
use App\Entity\CalculatorRequest;
use App\Entity\Calculation;

class CalculatorController extends AbstractController
{
    #[Route('/api/calculator', name: 'api_calculator')]
    public function index(Request $request): Response
    {
        $error = "";
        $calculatorRequest = new CalculatorRequest($request);
        $calculation = new Calculation();

        try {            
            $calculatorService = new CalculatorService($calculatorRequest);            
            $calculation = $calculatorService->getCalculation();
        }
        catch (\Exception $e) {
            $error = $e->getMessage();
        }

        return $this->json([
            'value_one' => $calculatorRequest->getValueOne(),
            'value_two' => $calculatorRequest->getValueTwo(),
            'operand' => $calculatorRequest->getOperand(),
            'result' => $calculation->getResult(),
            'error' => $error
        ]);
    }
}
