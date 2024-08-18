 <!-- tax.php -->
<?php
class caltax
{
    private $net;

    public function __construct($para_income){
        $this->net = $para_income;
    } // End const
    public function calculatortax(){
        $tax = 0;
        if ($this->net <= 150000) 
            $tax = 0;
        elseif ($this->net <=300000) 
            $tax = ($this->net -150000) * 5/100; //7,500
        elseif ($this->net <=500000) 
            $tax = ($this->net - 300000) * 10/100 + 7500; //27,500
        elseif ($this->net <=750000) 
            $tax = ($this->net - 500000) * 15/100 + 27500; //37,500
        elseif ($this->net <=1000000) 
            $tax = ($this->net - 750000) * 20/100 + 37500; //50,000
        elseif ($this->net <=2000000) 
            $tax = ($this->net - 1000000) * 25/100 + 50000;//36,5000
        elseif ($this->net <=5000000) 
            $tax = ($this->net - 2000000) * 30/100 + 365000;//12,65000
        else
            $tax = ($this->net - 5000000) * 35/100 + 1265000;
    return $tax;
    } // End function calculatortax
} // End Class
?>

<?php 
    $income = 552000;
    $mytax = new caltax($income);
    echo "รายได้ = $income บาท เสียภาษี =". $mytax->calculatortax();
?>

