<h1>ชยากร</h1>
<hr>

<?php
echo "ชยากร <br>";

function calnum($a, $op, $b) {
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
    elseif ($op == "\\")
        $c = intdiv($a, $b);
    elseif ($op == "^")
        $c = pow($a, $b);
    return $c;
    }
    
    $a=5;
    $b=3;
    
    echo "$a + $b = ". calnum($a,"+",$b)." (บวก)<br>";
	echo "$a - $b = ". calnum($a,"-",$b)." (ลบ)<br>";
	echo "$a * $b = ". calnum($a,"*",$b)." (คูณ)<br>";
	echo "$a / $b = ". number_format(calnum($a,"/",$b),2)." (หาร)<br>";
	echo "$a % $b = ". calnum($a,"%",$b)." (หารเอาเศษ)<br>";
	echo "$a \\ $b = ". calnum($a,"\\",$b)." (หารเอาจำนวนต็ม)<br>";
	echo "$a ^ $b = " . calnum($a,"^",$b) ." (ยกกำลัง)<br>";
?>