<?php // คลาสแม่ MathOperation
class MathOperation
{
    protected $number;
    // คอนสตรัคเตอร์เพื่อรับค่าตัวเลข
    public function __construct($number)
    {
        $this->number = $number;
    }
    // เมธอด calculate ที่จะถูกเขียนทับในคลาสลูก
    public function calculate()
    {
        return "No calculation defined in MathOperation class.";
    }
}

    class factorial extends MathOperation{
        
        public function calculate()
        {
            $F =1 ;
            $K = $this->number;
            while($K>1){
                $F = $F * $K;
                $K = $K-1;
            }
            return $F;
        }
    
    }

?>

<h2>เรียกใช้ class</h2>
 <?php 
    $N=5;
    $fac = new MathOperation($N);
    $fac_result = $fac->calculate();

    $fac1 = new factorial($N);
    $fac_result1 = $fac1->calculate();
 ?>

 <p><?php echo $fac_result ?></p>
 <hr>
 <p><?php echo "$N! =". $fac_result1 ?></p>