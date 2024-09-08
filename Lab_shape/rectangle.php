
<?php
require_once('shape_class.php');
class Rectangle extends shape{
private $width;
private $height;
public function __construct($name,$width, $height) {  
    parent::__construct($name);
    $this->width = $width;
    $this->height = $height;
}
public function setWidth($width) {
    $this->width = $width;
}
public function setHeight($height) {
    $this->height = $height;
}

public function getWidth() {
    return $this->width;
}
public function getheight() {
    return $this->height;
}
public function getArea() {
    return $this->width * $this-> height;
}
}

$rectangle =  new Rectangle("My Rectangle",10,5);
$rectangleArea = $rectangle->getArea();
?>

<h4>The area of  the <span class="text-danger fw-bold"><?php echo $rectangle->getName() ?></span></h4>
<p class="my-0">width = <?php echo $rectangle->getwidth()?> Unit</p>
<p class="my-0">height = <?php echo $rectangle->getheight()?> Unit</p>
<p class="my-0">Area =  <?php echo number_format($rectangleArea,2)?> Square unit</p>