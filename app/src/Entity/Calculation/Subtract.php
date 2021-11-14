<?php

namespace App\Entity\Calculation;

use App\Entity\Calculation;

class Subtract extends Calculation
{
    /**
     * Get Result
     * @return float
     */
    public function getResult() : float
    {
        return $this->valueOne - $this->valueTwo;
    }
}
