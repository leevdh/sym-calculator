<?php

namespace App\Service;

use App\Entity\Calculation;
use App\Entity\CalculatorRequest;
use App\Entity\Calculation\Subtract;
use App\Entity\Calculation\Divide;
use App\Entity\Calculation\Multiply;
use App\Entity\Calculation\Add;
use App\Entity\CalculationInterface;

class Calculator
{
    /**
     * @type CalculatorRequest
     */
    private $request;

    public function __construct(CalculatorRequest $calculatorRequest)
    {
        $this->request = $calculatorRequest;
    }
    /**
     * Calculate
     * @throws \Exception
     * @return float
     */
    public function getCalculation() : CalculationInterface
    {
        $calculatorRequest = $this->request;

        $calculatorRequest->validateRequest();

        switch ($calculatorRequest->getOperand()) {
            case Calculation::OPERAND_ADD:
                $calculation = new Add($calculatorRequest->getValueOne(), $calculatorRequest->getValueTwo());
                break;
            case Calculation::OPERAND_SUBTRACT:
                $calculation = new Subtract($calculatorRequest->getValueOne(), $calculatorRequest->getValueTwo());
                break;
            case Calculation::OPERAND_DIVIDE:
                $calculation = new Divide($calculatorRequest->getValueOne(), $calculatorRequest->getValueTwo());
                break;
            case Calculation::OPERAND_MULTIPLY:
                $calculation = new Multiply($calculatorRequest->getValueOne(), $calculatorRequest->getValueTwo());
                break;
            default:
                throw new \Exception("Unknown Operand");
        }

        return $calculation;
    }
}
