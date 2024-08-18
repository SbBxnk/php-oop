<h3>การเขียนโปรแกรมเชิงวัตถุ</h3>
<h2>chayakorn</h2>

<?php
    include_once ("myclass.php");
	//call function
    $a=5;
    $b=3;
    
    $ob_c = new Classnum($a,$b);
    $c = $ob_c->add();
    echo "$a + $b = $c <br>";
    $c = $ob_c->substract();
    echo "$a - $b = $c <br>";
	$c = $ob_c->multiply();
    echo "$a * $b = $c <br>";
    $c = $ob_c->div();
    echo "$a / $b = " . number_format($c, 2);
?>