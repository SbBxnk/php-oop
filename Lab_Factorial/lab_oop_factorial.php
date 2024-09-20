<?php 
class MathOperation
{
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function calculate()
    {
        return "No calculation defined in MathOperation class.";
    }
}

class factorial extends MathOperation
{

    public function calculate()
    {
        $F = 1;
        $K = $this->number;
        while ($K > 1) {
            $F = $F * $K;
            $K = $K - 1;
        }
        return $F;
    }
}

class Rec_factorial extends MathOperation
{
    public function calculate(){
        return $this->cal_factorial($this->number);
    }
    private function cal_factorial($N){
        if ($N == 0 || $N == 1)
            return 1;
        else
            return $N * $this->cal_factorial($N - 1);
    }
}
class Square extends MathOperation{
    public function calculate(){
        return $this->number * $this->number;
    }
}
class Circle extends MathOperation{
    public function calculate(){
        // return pi() *  pow($this->number,2);
        return pi() *  $this->number **2;
    }
}

?>

<h4>เรียกใช้ class</h4>
<?php
$N = 5;
$fac = new MathOperation($N);
$fac_result = $fac->calculate();

$fac = new factorial($N);
$fac1 = $fac->calculate();

$fac = new Rec_factorial($N);
$fac2 = $fac->calculate();

$sqaure = new Square($N);
$sqaure1 = $sqaure->calculate();

$circle = new Circle($N,null);
$circle1 = $circle->calculate();
?>

<p><?php echo $fac_result ?></p>
<hr>
<p><?php echo "$N! =" . $fac1 ?></p>
<h4>Recursive Function</h4>
<p><?php echo "$N! =" . $fac2 ?></p>
<h4>หาพื้นที่สี่เหลี่ยมจตุรัส</h4>
<p><?php echo "$N x $N =" . $sqaure1 ?> ตร.หน่วย</p>
<h4>หาพื้นที่วงกลม</h4>
<p><?php echo "3.14 x $N<sup>2</sup> =" . number_format($circle1,2) ?> ตร.หน่วย</p>


<h2 class="text-danger fw-bold ">Home workdadadadada</h2>

<pre>
select 
    - Fac OOP
    - Recursive
    - sqaure
    - Circle
</pre>