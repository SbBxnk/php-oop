<div class="container py-5 text-center text-muted">
    <h1 class="text-decoration-underline">คำนวณแบบ OOP</h1>
    <?php
    class Classnum
    {
        private $numA;
        private $numB;

        public function __construct($pmA, $pmB)
        {
            $this->numA = $pmA;
            $this->numB = $pmB;
        }

        public function add()
        {
            return $this->numA + $this->numB;
        }
    }

    if (isset($_POST['num_a']) && isset($_POST['num_b'])) {

        $numA = $_POST['num_a'];
        $numB = $_POST['num_b'];

        $Ob_c = new Classnum($numA, $numB);
        $c = $Ob_c->add();
    }
    ?>
    <p class="fs-2"><?php echo "$numA + $numB = $c"; ?></p>
    <br>
    <a class="btn btn-secondary mt-5" href="?p=Lab01">กลับ</a>
</div>