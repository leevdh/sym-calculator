<?php

use App\Entity\Calculation\Subtract;
use PHPUnit\Framework\TestCase;

final class SubtractTest extends TestCase
{
    public function testConstruct(): void
    {
        $calculation = new Subtract();
        $this->assertInstanceOf("App\Entity\Calculation\Subtract", $calculation);
    }

    public function testResult(): void
    {
        $calculation = new Subtract(5, 1.1);
        $this->assertEquals(3.9, $calculation->getResult());
    }
 
}