<?php
class Shape
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function __destruct()
    {
        echo "<br> __destruct the shape is {$this->name}";

    }
}


?>
<h3>การเรียกใช้งาน Class</h3>

<?php 
$rectangle = new Shape("Rectangle");
echo $rectangle->getName();
?>