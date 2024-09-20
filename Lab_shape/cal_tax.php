<?php 
class CalculateTax{

    private $income;

    public function __construct($income){
        $this->income = $income;
    }

    public function taxpermonth(){
        return $this->income* 7/100;
    }
    public function getnet(){
        return $this->income * 12;
    }
    public function gettax(){
        return ($this->income*12) - ($this->taxpermonth()*12);
    }

    public function gettotal(){
        return ($this->income*12 ) - ($this->income);
    }

}
    $name = 'naravit';
    $income = 2500;
    $caltax = new CalculateTax($income);

    $taxpermonth = $caltax->taxpermonth();
    $net = $caltax->getnet();


    $tax = $caltax->gettax();
    $total = $caltax->gettotal();

?>


<p><?php echo "ชื่อ ". $name ?></p>
<p><?php echo "เงินเดือน " . $income ?></p>
<p><?php echo  "ภาษีต่อเดือน :" .$taxpermonth?></p>
<p><?php echo  "รายได้ ".$net ?></p>
<p><?php echo  "ภาษี ".$tax ?></p>
<p><?php echo  "สุทธิ ".$total ?></p>