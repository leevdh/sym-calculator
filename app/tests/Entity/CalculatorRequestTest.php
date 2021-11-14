<?php

use App\Entity\CalculatorRequest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

final class CalculatorRequestTest extends TestCase
{
    public function testConstruct(): void
    {
        $request = new Request();
        $calculatorRequest = new CalculatorRequest($request);
        $this->assertInstanceOf("App\Entity\CalculatorRequest", $calculatorRequest);
    }

    public function testConstants(): void
    {
        $this->assertEquals(CalculatorRequest::MSG_OPERAND_REQUIRED, "Operand Required");
        $this->assertEquals(CalculatorRequest::MSG_OPERAND_INVALID, "Operand Invalid");
        $this->assertEquals(CalculatorRequest::MSG_VALUEONE_REQUIRED, "Value One Required");
        $this->assertEquals(CalculatorRequest::MSG_VALUETWO_REQUIRED, "Value Two Required");
    }

    public function testRequiredValueOne(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls("", "", "add");

        $calculatorRequest = new CalculatorRequest($request);

        try {
            $calculatorRequest->validateRequest();
        }
        catch (\Exception $e) {
            $this->assertEquals(CalculatorRequest::MSG_VALUEONE_REQUIRED, $e->getMessage());
        }
    }

    public function testRequiredValueTwo(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls(1, "", "add");

        $calculatorRequest = new CalculatorRequest($request);

        try {
            $calculatorRequest->validateRequest();
        }
        catch (\Exception $e) {
            $this->assertEquals(CalculatorRequest::MSG_VALUETWO_REQUIRED, $e->getMessage());
        }
    }

    public function testRequiredOperand(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls("", "", "");

        $calculatorRequest = new CalculatorRequest($request);

        try {
            $calculatorRequest->validateRequest();
        }
        catch (\Exception $e) {
            $this->assertEquals(CalculatorRequest::MSG_OPERAND_REQUIRED, $e->getMessage());
        }
    }

    public function testInvalidOperand(): void
    {
        $request = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        $request->expects($this->exactly(3))
            ->method("get")
            ->withConsecutive(["value_one"], ["value_two"], ["operand"])
            ->willReturnOnConsecutiveCalls(1, 2, "testing");

        $calculatorRequest = new CalculatorRequest($request);

        try {
            $calculatorRequest->validateRequest();
        }
        catch (\Exception $e) {
            $this->assertEquals(CalculatorRequest::MSG_OPERAND_INVALID, $e->getMessage());
        }
    }

}