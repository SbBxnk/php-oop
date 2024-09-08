
<?php
require_once("shape_class.php");
 class Triangle extends shape{
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
    public function getHeight() {
        return $this->height;
    }
    public function getArea() {
        return 1/2 * $this->width * $this-> height;
    }
 }

$triangle =  new Triangle("My Triangle",10,5);
$triangleArea = $triangle->getArea();
?>

<h4>The area of  the <span class="text-danger fw-bold"><?php echo $triangle->getName() ?></span></h4>
<p class="my-0">width = <?php echo $triangle->getwidth()?> Unit</p>
<p class="my-0">height = <?php echo $triangle->getheight()?> Unit</p>
<p class="my-0">Area =  <?php echo number_format($triangleArea,2)?> Square unit</p>