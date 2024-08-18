<div class="container mt-5">
    <div class="row">
        <div class="col-6 ">
            <?php
            $a = 5;
            $b = 3;
            $c = $a + $b;
            echo "create by Chayakorn";
            echo "<br>";
            echo $a . " + " . $b . " =" . $c;
            $a = 100;
            $b = 75;
            $c = $a + $b;
            echo "<br>" . $a . " + " . $b . " =" . $c;
            ?>
            <br>
        </div>
        <div class="col-6 text-danger ">
            <p>เขียนแบบทั่วไป</p>
        </div>
    </div>
    <hr>
    <!-- Calculator Function-->
    <div class="row">
        <div class="col-6">
            <?php
            function calnumber($a, $b)
            {
                $c = $a + $b;
                return $c;
            }
            echo "การเรียกใช้ฟังก์ชัน" . "<br>";
            $a = 5;
            $b = 3;
            echo $a . "+" . $b . "=" . calnumber($a, $b);
            echo "<br> 100 + 75 = " . calnumber(100, 75);
            ?>
        </div>
        <div class="col-6 text-danger">เขียนแบบฟังก์ชัน</div>
    </div>

    <hr>
    <!-- การเขียนโปรแกรมแบบ Object -->

    <div class="row">
        <div class="col-6">
            <?php
            class Classnum
            {
                private $a;
                private $b;

                public function __construct($pa, $pb)
                {
                    $this->a = $pa;
                    $this->b = $pb;
                }

                public function add()
                {
                    return $this->a + $this->b;
                }
            } // End Class
            echo "เรียกใช้ Classnum <br>";
            $a = 5;
            $b = 3;
            $Ob_c = new Classnum($a, $b);
            $c = $Ob_c->add();
            echo "$a + $b " . "=" . $c;

            $Ob_a = new Classnum(100, 75);
            echo "<br> 100 + 75 =" . $Ob_a->add();
            ?>
        </div>
        <div class="col-6 text-danger">เขียนแบบการใช้ OOP</div>
    </div>

</div>