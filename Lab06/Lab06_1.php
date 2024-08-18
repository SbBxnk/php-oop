<?php
if (isset($_POST["submit1"])) {
    $n = $_POST['n'];
    while ($n <= 10) {
        echo $n;
        $n++;
    }
}

if (isset($_POST["submit2"])) {
    $n = $_POST['n'];
    $f = 1;
    $k = $n;
    while ($k > 1) {
        $f = $f * $k;
        $k = $k - 1;
        echo $f . ' ';
    }
}

if (isset($_POST["submit3"])) {
    $salary = $_POST["salary"];
    $year = $_POST["year"];
    $Salarybonus = 0;
    $yearbonus = 0;

    if ($salary > 10000) {
        $Salarybonus = $salary*10/100; 
    } elseif ($salary > 5000) {
        $Salarybonus = $salary*7/100; 
    } else {
        $Salarybonus = $salary*5/100; 
    }

    if ($year >= 10) {
        $yearbonus = 10000; 
    } elseif ($year > 5) {
        $yearbonus = 5000; 
    } else {
        $yearbonus = 3000; 
    }

    $totalSalary = $salary + $Salarybonus + $yearbonus;

    echo "$totalSalary";
}
?>

<div class="container">
    <form action="" method="post">
        <input type="number" name="n" required>
        <button type="submit" name="submit1">ข้อ 1</button>
        <button type="submit" name="submit2">ข้อ 2 </button>
    </form>
    <form action="" method="post">
        <input type="number" name="salary" required>
        <input type="number" name="year" required>
        <button type="submit" name="submit3">ข้อ 3</button>

    </form>
</div>

<div class="container">

</div>
8700+609+10000