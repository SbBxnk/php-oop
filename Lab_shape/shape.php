<?php
class Shape
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
?>

<?php
$rectangle = new Shape("Rectangle");
echo $rectangle->getName();
echo "<br>";
$rectangle = new Shape("Trainagle");
echo $rectangle->getName();
echo "<br>";
$rectangle->setName("Circle");
echo $rectangle->getName();
?>