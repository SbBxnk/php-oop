
    <div class="container py-5 text-muted text-center">
        <h1 class="text-decoration-underline">ผลลัพธ์</h1>
        <?php
        function calnum($a, $op, $b)
        {
            $c = 0;
            if ($op == "+")
                $c = $a + $b;
            elseif ($op == "-")
                $c = $a - $b;
            elseif ($op == "*")
                $c = $a * $b;
            elseif ($op == "/")
                $c = $a / $b;
            elseif ($op == "%")
                $c = $a % $b;
            elseif ($op == "^")
                $c = pow($a, $b);
            elseif ($op = "\\")
                $c = intdiv($a, $b);
            return $c;
        }

        //การทำงาน
        if (isset($_POST['cal'])) {
            $a = $_POST['a'];
            $op = $_POST['op']; 
            $b = $_POST['b'];
        }
        ?>
        <br>
        <p class="fs-2"><?php echo "$a $op $b = ". calnum($a,$op,$b); ?></p>
        <a class="btn btn-secondary mt-5" href="?p=Lab02">กลับ</a>
    </div>
