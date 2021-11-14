<?php

use App\Entity\Calculation\Multiply;
use PHPUnit\Framework\TestCase;

final class MultiplyTest extends TestCase
{
    public function testConstruct(): void
    {
        $calculation = new Multiply();
        $this->assertInstanceOf("App\Entity\Calculation\Multiply", $calculation);
    }

    public function testResult(): void
    {
        $calculation = new Multiply(5, 1.1);
        $this->assertEquals(5.5, $calculation->getResult());
    }
}