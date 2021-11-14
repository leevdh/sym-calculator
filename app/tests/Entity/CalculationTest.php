<?php

use App\Entity\Calculation;
use PHPUnit\Framework\TestCase;

final class CalculationTest extends TestCase
{
    public function testConstruct(): void
    {
        $calculation = new Calculation();
        $this->assertInstanceOf("App\Entity\Calculation", $calculation);
        $this->assertEquals(0, $calculation->getResult());
    }

    public function testConstants(): void
    {
        $this->assertEquals(Calculation::OPERAND_ADD, "add");
        $this->assertEquals(Calculation::OPERAND_SUBTRACT, "subtract");
        $this->assertEquals(Calculation::OPERAND_DIVIDE, "divide");
        $this->assertEquals(Calculation::OPERAND_MULTIPLY, "multiply");
    }
}