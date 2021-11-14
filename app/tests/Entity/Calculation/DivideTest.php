<?php

use App\Entity\Calculation\Divide;
use PHPUnit\Framework\TestCase;

final class DivideTest extends TestCase
{
    public function testConstruct(): void
    {
        $calculation = new Divide();
        $this->assertInstanceOf("App\Entity\Calculation\Divide", $calculation);
    }

    public function testResult(): void
    {
        $calculation = new Divide(5, 2);
        $this->assertEquals(2.5, $calculation->getResult());
    }
}