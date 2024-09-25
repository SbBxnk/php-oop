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
    public function calculate()
    {
        return $this->cal_factorial($this->number);
    }
    private function cal_factorial($N)
    {
        if ($N == 0 || $N == 1)
            return 1;
        else
            return $N * $this->cal_factorial($N - 1);
    }
}
class Square extends MathOperation
{
    public function calculate()
    {
        return $this->number * $this->number;
    }
}
class Circle extends MathOperation
{
    public function calculate()
    {
        // return pi() *  pow($this->number,2);
        return pi() *  $this->number ** 2;
    }
}

?>



<?php
if (isset($_POST['submit'])) {
    // $N = 5;
    $N = $_POST['N'];
    $fac = new MathOperation($N);
    $fac_result = $fac->calculate();

    $fac = new factorial($N);
    $fac1 = $fac->calculate();

    $fac = new Rec_factorial($N);
    $fac2 = $fac->calculate();

    $sqaure = new Square($N);
    $sqaure1 = $sqaure->calculate();

    $circle = new Circle($N, null);
    $circle1 = $circle->calculate();
} 
?>

