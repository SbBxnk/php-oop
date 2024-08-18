<div class="container py-5 text-center text-muted">
    <h1 class="text-muted text-decoration-underline">คำนวณแบบฟังก์ชัน</h1>
    <?php
    function calnumber($numA, $numB)
    {
        $numC = $numA + $numB;
        return $numC;
    }

    if (isset($_POST['cal2'])) {
        $numA = $_POST['num_a'];
        $numB = $_POST['num_b'];

        ?>
        <p class="fs-2 "><?php echo $numA . " + " . $numB . " = " . calnumber($numA, $numB); ?></p>
        <br>
        <a class="btn btn-secondary mt-5" href="?p=Lab01">กลับ</a>
    </div>

<?php 
}
?>