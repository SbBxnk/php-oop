<!------------------หลักการเขียนฟังก์ชั่น--------------->
<center>
<h2>การเขียนฟังก์ชั่น</h2>
<h3>หาพื้นที่สี่เหลี่ยม</h3>
<?php 
    function calrectancle($width,$height){
        $area = $width * $height;
        return $area;
    }
    function lenght_rectancle($width,$height){
        return (2*$width)+(2*$height);
    }
?>

<h3 style="color:Tomato;" >ผลลัพธ์ No.1</h3>
<p>ความกว้าง = 10</p>
<p>ความยาว = 15</p>
<span>พื้นที่ = <?php echo calrectancle(10,15);?> ตารางเซนติเมตร</span> <br>
<span>ความยาวรอบรูป = <?php echo lenght_rectancle(10,15);?> ตารางเซนติเมตร</span>
<hr>


<h3 style="color:Tomato;">ผลลัพธ์ No.2</h3>
<p>ความกว้าง = 72</p>
<p>ความยาว = 120</p>
<span>พื้นที่ = <?php echo calrectancle(72,120);?> ตารางเซนติเมตร</span> <br>
<span>ความยาวรอบรูป = <?php echo lenght_rectancle(72,120);?> ตารางเซนติเมตร</span>
<hr>
</center>