<?php 
class TaxCalculator {

    protected $income;

    public function __construct($income){
        $this->income = $income;
    }

    public function calculateTax(){
        return 'No tax calculation defined.';
    }
}

?>
