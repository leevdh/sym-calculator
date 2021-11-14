<?php
namespace App\Entity;

interface CalculationInterface {
    public function getResult() : float;
}

class Calculation implements CalculationInterface 
{
    const OPERAND_ADD = "add";
    const OPERAND_SUBTRACT = "subtract";
    const OPERAND_DIVIDE = "divide";
    const OPERAND_MULTIPLY = "multiply";

    /**
     * @type float
     */
    protected $valueOne;

    /**
     * @type float
     */
    protected $valueTwo;

    public function __construct(float $valueOne = 0, float $valueTwo = 0)
    {
        $this->valueOne = $valueOne;
        $this->valueTwo = $valueTwo;
    }

    /**
     * Get Result
     * @return float
     */
    public function getResult() : float
    {
        return 0;
    } 
}