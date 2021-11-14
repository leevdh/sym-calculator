<?php

use App\Entity\Calculation\Add;
use PHPUnit\Framework\TestCase;

final class AddTest extends TestCase
{
    public function testConstruct(): void
    {
        $calculation = new Add();
        $this->assertInstanceOf("App\Entity\Calculation\Add", $calculation);
    }

    public function testResult(): void
    {
        $calculation = new Add(1.1, 2.4);
        $this->assertEquals(3.5, $calculation->getResult());
    }
}