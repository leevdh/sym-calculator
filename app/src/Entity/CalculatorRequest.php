<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\Request;

class CalculatorRequest
{
    /**
     * CONSTANTS
     */
    const MSG_OPERAND_REQUIRED = "Operand Required";
    const MSG_OPERAND_INVALID = "Operand Invalid";
    const MSG_VALUEONE_REQUIRED = "Value One Required";
    const MSG_VALUETWO_REQUIRED = "Value Two Required";

    /**
     * @type="float"
     */
    private $valueOne;

    /**
     * @type="float"
     */
    private $valueTwo;

    /**
     * @type="string"
     */
    private $operand;

    /**
     * @type="array"
     */
    private $operands = [
        Calculation::OPERAND_ADD,
        Calculation::OPERAND_SUBTRACT,
        Calculation::OPERAND_DIVIDE,
        Calculation::OPERAND_MULTIPLY
    ];

    /**
     * Entity/Calculator construct
     */
    public function __construct(Request $request)
    {
        $this->valueOne = $request->get("value_one");
        $this->valueTwo = $request->get("value_two");
        $this->operand = $request->get("operand");
    }

    /**
     * Get Operand
     * @return string
     */
    public function getOperand() : string
    {
        return $this->operand;
    }

    /**
     * Get Value One
     * @return float
     */
    public function getValueOne() : float
    {
        return $this->valueOne;
    }

    /**
     * Get Value Two
     * @return float
     */
    public function getValueTwo() : float
    {
        return $this->valueTwo;
    }

    /**
     * Validate Request
     * @throws \Exception
     */
    public function validateRequest()
    {
        if (is_null($this->operand) || $this->operand == "") {
            throw new \Exception(self::MSG_OPERAND_REQUIRED);
        }

        if (is_null($this->valueOne) || $this->valueOne == "") {
            throw new \Exception(self::MSG_VALUEONE_REQUIRED);
        }

        if (is_null($this->valueTwo) || $this->valueTwo == "") {
            throw new \Exception(self::MSG_VALUETWO_REQUIRED);
        }

        if (!in_array($this->operand, $this->operands)) {
            throw new \Exception(self::MSG_OPERAND_INVALID);
        }
    }
}
