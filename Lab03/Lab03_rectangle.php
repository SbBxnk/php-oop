<?php

class Rectangle
{
    private $width;
    private $hight;
    // สี่เหลี่ยม

    public function Rarea()
    {
        return $this->width * $this->hight;
    }
    public function Rlenght()
    {
        return ($this->width * 2) + ($this->hight * 2);
    }

    public function setwidth($pwidth)
    {
        $this->width = $pwidth;
    }
    public function sethight($phight)
    {
        $this->hight = $phight;
    }


} // end class
$rect = new Rectangle();
?>
<div class="container py-5 text-center">
    <?php
    $rect->setwidth(52);
    $rect->sethight(21);
    ?>
    <h3 class="text-primary">สี่เหลี่ยมผืนผ้าที่ 1</h3>
    <p>ความกว้าง = 52</p>
    <p>ความยาว = 21</p>
    <span>พื้นที่ = <?php echo $rect->Rarea(); ?> ตารางเซนติเมตร</span> <br>
    <span>ความยาวรอบรูป = <?php echo $rect->Rlenght(); ?> ตารางเซนติเมตร</span>
    <hr>

    <?php
    $rect->setwidth(20);
    $rect->sethight(40);
    ?>
    <h3 class="text-primary">สี่เหลี่ยมผืนผ้าที่ 2</h3>
    <p>ความกว้าง = 20</p>
    <p>ความยาว = 40</p>
    <span>พื้นที่ = <?php echo $rect->Rarea(); ?> ตารางเซนติเมตร</span> <br>
    <span>ความยาวรอบรูป = <?php echo $rect->Rlenght(); ?> ตารางเซนติเมตร</span>
    <hr>

    <?php
    $rect->setwidth(42);
    $rect->sethight(13);
    ?>
    <h3 class="text-primary">สี่เหลี่ยมผืนผ้าที่ 3</h3>
    <p>ความกว้าง = 42</p>
    <p>ความยาว = 13</p>
    <span>พื้นที่ = <?php echo $rect->Rarea(); ?> ตารางเซนติเมตร</span> <br>
    <span>ความยาวรอบรูป = <?php echo $rect->Rlenght(); ?> ตารางเซนติเมตร</span>
    <hr>
</div>