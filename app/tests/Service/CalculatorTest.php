<?php

use App\Entity\CalculatorRequest;
use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    public function testConstruct(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $calculatorRequest = new CalculatorRequest($request);

        $calculator = new Calculator($calculatorRequest);
        $this->assertInstanceOf("App\Service\Calculator", $calculator);
    }

    public function testAdd(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls(1, 2, "add");

        $calculatorRequest = new CalculatorRequest($request);
        $calculation = new Calculator($calculatorRequest);
        $this->assertInstanceOf("App\Entity\Calculation\Add", $calculation->getCalculation());
    }

    public function testMultiply(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls(1, 2, "multiply");

        $calculatorRequest = new CalculatorRequest($request);
        $calculation = new Calculator($calculatorRequest);
        $this->assertInstanceOf("App\Entity\Calculation\Multiply", $calculation->getCalculation());
    }    

    public function testSubtract(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls(1, 2, "subtract");

        $calculatorRequest = new CalculatorRequest($request);
        $calculation = new Calculator($calculatorRequest);
        $this->assertInstanceOf("App\Entity\Calculation\Subtract", $calculation->getCalculation());
    }    

    public function testDivide(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls(1, 2, "divide");

        $calculatorRequest = new CalculatorRequest($request);
        $calculation = new Calculator($calculatorRequest);
        $this->assertInstanceOf("App\Entity\Calculation\Divide", $calculation->getCalculation());
    }    
}