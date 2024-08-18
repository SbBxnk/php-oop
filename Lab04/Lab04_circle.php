<?php 
class Circle {
    private $radius;
    public function setRadius($Circleradius) {
        $this->radius = $Circleradius;
    }
    // วงกลม
    public function CArea() {
        return pi() * pow($this->radius, 2);
    }
    public function CLenght() {
        return 2 * pi() * $this->radius;
    }
    public function getRadius() {
        return $this->radius;
    }
}

$circle = new Circle();
?>

<div class="container py-5 text-center">
    
<?php
    $circle->setRadius(5);
?>
<h3 style="color:Tomato;" >วงกลมที่ 1</h3>
<p>รัศมีวงกลม = <?php echo $circle->getRadius() ?></p>
<span>พื้นที่รอบวง = <?php echo number_format($circle->CArea(),2); ?> ตารางเซนติเมตร</span> <br>
<span>เส้นรอบวง = <?php echo number_format($circle->CLenght(),2); ?> ตารางเซนติเมตร</span>
<hr>

<?php
    $circle->setRadius(10);
?>
<h3 style="color:Tomato;" >วงกลมที่ 2</h3>
<p>รัศมีวงกลม = <?php echo $circle->getRadius() ?></p>
<span>พื้นที่รอบวง = <?php echo number_format($circle->CArea(),2); ?> ตารางเซนติเมตร</span> <br>
<span>เส้นรอบวง = <?php echo number_format($circle->CLenght(),2); ?> ตารางเซนติเมตร</span>
<hr>

<?php
    $circle->setRadius(26);
?>
<h3 style="color:Tomato;" >วงกลมที่ 3</h3>
<p>รัศมีวงกลม = <?php echo $circle->getRadius() ?></p>
<span>พื้นที่รอบวง = <?php echo number_format($circle->CArea(),2); ?> ตารางเซนติเมตร</span> <br>
<span>เส้นรอบวง = <?php echo number_format($circle->CLenght(),2); ?> ตารางเซนติเมตร</span>

</div>
