


<div class="container py-5 text-center text-muted" style="width:500px;">
    <h1 class="text-decoration-underline">ใบเสร็จรับเงิน</h1>
    <?php

    if (isset($_POST["cal"])) {
        $product_id = $_POST['product_id']; //รหัสสินค้า
        $product_name = $_POST['product_name']; //ชื่อสินค้า
        $product_qty = $_POST['product_qty']; //จำนวน
        $price = 15;

        $total = $price * $product_qty;
        $free = floor($product_qty / 3);
        $discout = $free * $price;
        $so = $total - $discout;
    }

    ?>
    

    <p align="">รหัสสินค้า <?php echo $product_id ?></p>
    <p>ชื่อสินค้า <?php echo $product_name ?></p>
    <p>จำนวน <?php echo $product_qty ?> ขวด</p>
    <p>ราคา <?php echo $price ?> บาท</p>
    <p>รวมเงิน <?php echo $total ?> ขวด</p>
    <p>ฟรี <?php echo $free ?> ขวด</p>
    <p>ส่วนลด <?php echo $discout ?> บาท</p>
    <hr>
    <p>รวมเงินสุทธิ <?php echo $so ?> บาท</p>

    <a class="btn btn-secondary" href="?p=Lab05">กลับ</a>
</div>