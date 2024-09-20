<?php 

require_once("my_tax.php");

class Vat extends TaxCalculator{

    public function calculateTax(){
        return $this->income * 0.07; 
    }
}

?>

