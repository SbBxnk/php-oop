


<div class="container py-5 text-center text-muted" style="width:500px;">
    <h1 class="text-decoration-underline">ใบเสร็จรับเงิน</h1>
    <?php
        function total($product_qty,$price){
            $total = $product_qty * $price;
            return $total;
        }
        function free($product_qty){
            $free = floor($product_qty /3);
            return $free;
        }
        function discout($free,$price){
            $discout = $free * $price;
            return $discout;
        }
        function Netprice($discout,$total){
            $Netprice = $total - $discout;
            return $Netprice;
        }

    if (isset($_POST["cal"])) {
        // รับค่ามาจากการป้อน InPut
        $product_id = $_POST['product_id']; //รหัสสินค้า
        $product_name = $_POST['product_name']; //ชื่อสินค้า
        $product_qty = $_POST['product_qty']; //จำนวน
        $price = $_POST['price']; //ราคาสินค้า

        // รับค่ามาจาก function
        $total = total($product_qty,$price);
        $free = free($product_qty);
        $discout =  discout($free,$price);
        $Netprice = Netprice($discout,$total);
    }
    ?>
    <p>รหัสสินค้า: <?php echo $_POST['product_id'] ?></p>
    <p>ราการสินค้า: <?php echo $_POST['product_name'] ?></p>
    <p>จำนวนสินค้า: <?php echo $_POST['product_qty'] ?> ขวด</p>
    <p>ราคาสินค้า: <?php echo $_POST['price'] ?> บาท</p>
    <p>รวมทั้งสิ้น: <?php echo $total ?> บาท</p>
    <p>สินค้าฟรี: <?php echo $free ?> ขวด</p>
    <p>ส่วนลด: <?php echo $discout ?> บาท</p>
    <p>ราคาสุทธิ: <?php echo $Netprice ?> บาท</p>

    <a class="btn btn-secondary" href="?p=Lab05_home_work">กลับ</a>
</div>