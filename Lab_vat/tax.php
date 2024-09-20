<?php

require_once("my_tax.php");


class IncomeTax extends TaxCalculator
{

    public function calculateTax()
    {
        if ($this->income <= 150000) {
            return 0;
        } else if ($this->income <= 300000) {
            return $this->income * 0.10; //ภาษี 10%
        } else {
            return $this->income * 0.20; //ภาษี 20%
        }
    }
}
