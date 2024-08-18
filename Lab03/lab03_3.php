<center>
<h2 style="color:#0000ff;">การเขียนโปรแกรมแบบ OOP</h2>
<?php 
    class Rectangle{
        private $width;
        private $hight;
        public function __construct($pwidth,$phight)
        {
            $this->width = $pwidth;
            $this->hight = $phight;
        }//end construct

        public function area()
        {
            return $this->width * $this->hight;
        }
        public function lenght()
        {
            return ($this->width *2) + ($this->hight *2);
        }
        
        // สูตร
        public function setwidth($pwidth){
            $this->width = $pwidth;
        }
        public function sethight($phight){
            $this->hight = $phight;
        }

        public function getwidth(){
            return $this->width;
        }
        public function gethight(){
            return $this->hight;
        }
        
    }//end class 


?>
<h3 style="color:Tomato;" >ผลลัพธ์ No.1</h3>
<?php 
    $rect = new Rectangle(10,5);
?>

<p>ความกว้าง = 10</p>
<p>ความยาว = 5</p>
<span>พื้นที่ = <?php echo $rect->area();?> ตารางเซนติเมตร</span> <br>
<span>ความยาวรอบรูป = <?php echo $rect->lenght();?> ตารางเซนติเมตร</span>
<hr>


<?php
    $rect->setwidth(72);
    $rect->sethight(100);
?>
<h3 style="color:Tomato;" >ผลลัพธ์ No.2</h3>
<span>ความกว้าง = <?php echo $rect->getwidth();?> ตารางเซนติเมตร</span> <br>
<span>ความยาว = <?php echo $rect->gethight();?> ตารางเซนติเมตร</span> <br>
<span>พื้นที่ =<?php echo $rect->getwidth();?> x <?php echo $rect->gethight();?>  = <?php echo $rect->area();?> ตารางเซนติเมตร</span> <br>
<span>ความยาวรอบรูป = <?php echo $rect->lenght();?> ตารางเซนติเมตร</span>
<hr>

<?php
    $rect->setwidth(25.5);
    $rect->sethight(23.5);
?>
<h3 style="color:Tomato;" >ผลลัพธ์ No.3</h3>
<span>ความกว้าง = <?php echo $rect->getwidth();?> ตารางเซนติเมตร</span> <br>
<span>ความยาว = <?php echo $rect->gethight();?> ตารางเซนติเมตร</span> <br>
<span>พื้นที่ =<?php echo $rect->getwidth();?> x <?php echo $rect->gethight();?>  = <?php echo $rect->area();?> ตารางเซนติเมตร</span> <br>
<span>ความยาวรอบรูป = <?php echo $rect->lenght();?> ตารางเซนติเมตร</span>
<hr>


</center>