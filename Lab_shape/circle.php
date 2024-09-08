
<?php
require_once("shape_class.php");
 class Circle extends shape{
    private $radius;
    public function __construct($name,$radius) {  
        parent::__construct($name);
        $this->radius = $radius;
    }
    public function getRadius() {
        return $this->radius;
    }
    public function getArea() {
        return pi() * $this-> radius **2;
    }
 }

$circle =  new Circle("My Circle",5);
$circleArea = $circle->getArea();
?>

<h4>The area of  the <span class="text-danger fw-bold"><?php echo $circle->getName() ?></span></h4>
<p class="my-0">Radius = <?php echo $circle->getRadius()?> Unit</p>
<p class="my-0">Area =  <?php echo number_format($circleArea,2)?> Square unit</p>