<div class="container py-5 text-center text-muted">
    <h1 class="text-muted text-decoration-underline">คำนวณแบบทั่วไป</h1>
    <?php
    if (isset($_POST['cal1'])) {
        $a = $_POST['num_a'];
        $b = $_POST['num_b'];
        $c = $a + $b;
        echo "<p class='fs-2'>$a + $b = $c</p>";
    }
    ?>
    <br>
    <a class="btn btn-secondary mt-5" href="?p=Lab01">กลับ</a>
</div>