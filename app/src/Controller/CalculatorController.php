<?php

namespace App\Controller;

use App\Entity\Calculation;
use App\Entity\CalculatorRequest;
use App\Service\Calculator as CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/calculator', name: 'calculator')]
    public function index(Request $request): Response
    {
        $calculation = new Calculation();
        $showResult = false;

        if ($request->getMethod() == Request::METHOD_POST) {
            try {
                $calculatorService = new CalculatorService(new CalculatorRequest($request));
                $calculation = $calculatorService->getCalculation();
                $showResult = true;
            }
            catch (\Exception $e) {
                $this->addFlash("error", $e->getMessage());
            }
        }

        $tplValues = [
            'operand_add' => Calculation::OPERAND_ADD,
            'operand_subtract' => Calculation::OPERAND_SUBTRACT,
            'operand_divide' => Calculation::OPERAND_DIVIDE,
            'operand_multiply' => Calculation::OPERAND_MULTIPLY,
            'result' => $calculation->getResult(),
            'showResult' => $showResult
        ];
        return $this->render('calculator/index.html.twig', $tplValues);        
    }
}
