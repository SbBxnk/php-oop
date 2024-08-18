<style>
    .form {
        padding: 20px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 400px;
        /* border: solid 2px; */
    }

    .container-sm {
        max-width: 400px;
    }

    input,
    select {
        margin-top: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .modal-body {
        max-height: 300px;
        overflow-y: auto;
    }

    #source {
        font-size: 13px;
    }

    :not(pre)>code[class*=language-],
    pre[class*=language-] {
        background-color: #ffff;
    }


    .tb-hover .active td {
        background-color: #f50c0c;
        font-weight: bold;
        color: #fff;
    }
</style>

<?php
function discount($total)
{
    $discount = 0;
    if ($total > 20000) {
        $discount = $total * 20 / 100;
    } else if ($total > 15000) {
        $discount = $total * 15 / 100;
    } else if ($total > 10000) {
        $discount = $total * 10 / 100;
    } else if ($total >= 5000) {
        $discount = $total * 5 / 100;
    } else {
        $discount = 0;
    }
    return $discount;
}

if (isset($_POST["cal"])) {
    $code = $_POST["code"];
    $gname = $_POST["gname"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $unit = $_POST["unit"];
    $total = $price * $unit;
    $discount = discount($total);
    $payment = $total - $discount;
}
?>


<div class="container-fluid pt-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 justify-content-center mt-0">
        <h2 class="fw-bold text-center mt-3 mb-3">คำนวณยอดการสั่งซื้อ</h2>
        <div class="col-12 col-lg-6 d-flex justify-content-center mt-0">
            <div class="d-flex justify-content-center align-items-center input-group">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="name" class="form-label fw-bold">รหัสสินค้า</label>
                            <input type="text" class="form-control" value="<?php echo $code ?>" disabled>
                        </div>
                        <div class="col-md-5">
                            <label for="name" class="form-label fw-bold">ชื่อสินค้า</label>
                            <input type="text" class="form-control" value="<?php echo $gname ?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label fw-bold">ประเภทสินค้า</label>
                            <input type="text" class="form-control" value="<?php echo $type ?>" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-bold">ราคาต่อหน่วย</label>
                            <input type="text" class="form-control" value="<?php echo number_format($price, 2) . ' บาท' ?>"
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="unit" class="form-label fw-bold">จำนวนซื้อ</label>
                            <input type="text" class="form-control" value="<?php echo number_format($unit, 2) . ' บาท' ?>"
                                disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="name" class="form-label fw-bold">ราคารวม</label>
                            <input type="text" class="form-control "
                                value="<?php echo number_format($total, 2) . ' บาท' ?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label fw-bold">ส่วนลด</label>
                            <input type="text" class="form-control text-danger"
                                value="<?php echo number_format($discount, 2) . ' บาท' ?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label fw-bold">ราคาสุทธิ</label>
                            <input type="text" class="form-control text-bg-success"
                                value="<?php echo number_format($payment, 2) . ' บาท' ?>" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-center border-2 border-dark border-end mt-3">
            <table class="table tb-hover">
                <thead>
                    <tr class="text-center">
                        <th class="col">ยอดซื้อ</th>
                        <th class="col">ส่วนลด</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr class="<?php echo ($total > 20000) ? 'active' : ''; ?>">
                        <td>มากกว่า 20,000 บาท</td>
                        <td class="text-center">20%</td>
                    </tr>
                    <tr class="<?php echo ($total >= 15001 && $total <= 20000) ? 'active' : ''; ?>">
                        <td>มากกว่า 15,000 บาท</td>
                        <td class="text-center">15%</td>
                    </tr>
                    <tr class="<?php echo ($total >= 10001 && $total <= 15000) ? 'active' : ''; ?>">
                        <td>มากกว่า 10,000 บาท</td>
                        <td class="text-center">10%</td>
                    </tr>
                    <tr class="<?php echo ($total >= 5000 && $total <= 10000) ? 'active' : ''; ?>">
                        <td>5,000 บาท เป็นต้นไป</td>
                        <td class="text-center">5%</td>
                    </tr>
                    <tr class="<?php echo ($total >= 0 && $total < 5000) ? 'active' : ''; ?>">
                        <td>น้อยกว่า 5,000 บาท</td>
                        <td class="text-center">ไม่มีส่วนลด</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class=" button d-flex align-items-center justify-content-center">
        <a href="?p=Lab07_normal" class="col-3 btn btn-secondary">กลับ</a>
    </div>
</div>