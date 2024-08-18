



<div class="container py-5 text-muted text-center">
    <h1 class="text-decoration-underline">พื้นที่วงกลม</h1>
    <?php
    class Circle
    {
        private $radius;

        public function setRadius($Circleradius)
        {
            $this->radius = $Circleradius;
        }
        public function getRadius()
        { //แสดงเส้นรัศมี
            return $this->radius;
        }

        public function CArea() // หาพื้นที่
        {
            return pi() * pow($this->radius, 2);
        }

        public function CLenght() // หาเส้นรอบวง
        {
            return 2 * pi() * $this->radius;
        }
    }

    if (isset($_POST['cal'])) {
        $radius = $_POST['radius'];
        $circle = new Circle();


        $circle->setRadius($radius);
        $circleArea = $circle->CArea();
        $circLenght = $circle->CLenght();
    }
    ?>

    <div><h3 class="text-danger fs-2">เส้นรัศมี = <?php echo $circle->getRadius(); ?> </h3></div>
    <div class=" fs-2">พื้นที่วงกลม = <?php echo number_format(($circleArea ),2)?> ตร.ม</div>
    <div class=" fs-2">เส้นรอบวง = <?php echo number_format(($circLenght),2) ?> </div>


    <a class="btn btn-secondary mt-5" href="?p=Lab04">กลับ</a>
</div>