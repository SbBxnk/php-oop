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

    tr {
        text-align: center;
    }


    .tb-hover .active td {
        background-color: #00ff6a48;
        font-weight: bold;
    }
</style>

<?php

function caltax($net_ic) {
    $tax = 0;
     if ($net_ic > 150000 && $net_ic <= 300000) {
        $tax = ($net_ic - 150000) * 0.05;
    } else if ($net_ic > 300000 && $net_ic <= 500000) {
        $tax = (150000 * 0.05) + (($net_ic - 300000) * 0.10);
    } else if ($net_ic > 500000 && $net_ic <= 750000) {
        $tax = (150000 * 0.05) + (200000 * 0.10) + (($net_ic - 500000) * 0.15);
    } else if ($net_ic > 750000 && $net_ic <= 1000000) {
        $tax = (150000 * 0.05) + (200000 * 0.10) + (250000 * 0.15) + (($net_ic - 750000) * 0.20);
    } else if ($net_ic > 1000000 && $net_ic <= 2000000) {
        $tax = (150000 * 0.05) + (200000 * 0.10) + (250000 * 0.15) + (250000 * 0.20) + (($net_ic - 1000000) * 0.25);
    } else if ($net_ic > 2000000 && $net_ic <= 5000000) {
        $tax = (150000 * 0.05) + (200000 * 0.10) + (250000 * 0.15) + (250000 * 0.20) + (1000000 * 0.25) + (($net_ic - 2000000) * 0.30);
    } else if ($net_ic > 5000000) {
        $tax = (150000 * 0.05) + (200000 * 0.10) + (250000 * 0.15) + (250000 * 0.20) + (1000000 * 0.25) + (3000000 * 0.30) + (($net_ic - 5000000) * 0.35);
    }
    return $tax;
}



if (isset($_POST['cal'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $net_ic = $_POST['net_ic'];
    $tax = caltax($net_ic);
}

?>


<div class="container-fluid pt-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 justify-content-center mt-0">
        <h2 class="fw-bold text-center mt-3 mb-0">คำนวณภาษี</h2>
        <div class="col-12 col-lg-5 d-flex justify-content-center mt-0">
            <div class="d-flex justify-content-center align-items-center input-group">
                <form class="form" action="?p=Lab05_normal" method="post">
                    <label class="pt-2">รหัสพนักงาน</label>
                    <input type="text" class="form-control" value="<?php echo $emp_id ?>" disabled>
                    <label class="pt-2">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" value="<?php echo $emp_name ?>" disabled>
                    <label class="pt-2">รายได้สุทธิ</label>
                    <input type="text" class="form-control" value="<?php echo number_format($net_ic) . ' บาท' ?>"
                        disabled>
                    <label class="pt-2">ภาษี</label>
                    <input type="text" class="form-control" value="<?php echo number_format($tax) . ' บาท'; ?>"
                        disabled>
                    <div class=" button d-flex align-items-center justify-content-center">
                        <a href="?p=Lab06" class="col-6 btn btn-secondary">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-5 d-flex justify-content-center border-2 border-dark border-end mt-3">
            <table class="table tb-hover">
                <thead>
                    <tr>
                        <th class="col">เงินได้สุทธิ (บาท)</th>
                        <th class="col">อัตราภาษี</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <!-- 
                        (เงื่อนไข) หรือค่าที่เราป้อนมา ตรงกับ () ตารางไหนจะแสดง active ตารางนั้น
                        ? คือการตัดสินใจ ว่าจะให้เป็นจริงหรือเท็จ หากเข้าเงื่อนไขเป็นจริง จะใช้ 'active' หากเป็น เท็จจะเป็นใช้ ' '(ค่าว่าง) ส่งกลับไป
                        : คือ หรือ เช่น 'active' หรือ ' ' โดยใช้การตัดสินใจจากเครื่องหมาย ? 
                    -->
                    <tr class="<?php echo ($net_ic <= 150000) ? 'active' : ''; ?>">
                        <td>1 - 150,000</td>
                        <td>ได้รับยกเว้น</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 150000 && $net_ic <= 300000) ? 'active' : ''; ?>">
                        <td>150,001 - 300,000</td>
                        <td>5%</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 300000 && $net_ic <= 500000) ? 'active' : ''; ?>">
                        <td>300,001 - 500,000</td>
                        <td>10%</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 500000 && $net_ic <= 750000) ? 'active' : ''; ?>">
                        <td>500,001 - 750,000</td>
                        <td>15%</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 750000 && $net_ic <= 1000000) ? 'active' : ''; ?>">
                        <td>750,001 - 1,000,000</td>
                        <td>20%</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 1000000 && $net_ic <= 2000000) ? 'active' : ''; ?>">
                        <td>1,000,001 - 2,000,000</td>
                        <td>25%</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 2000000 && $net_ic <= 5000000) ? 'active' : ''; ?>">
                        <td>2,000,001 - 5,000,000</td>
                        <td>30%</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 5000000) ? 'active' : ''; ?>">
                        <td>5,000,001 บาทขึ้นไป</td>
                        <td>35%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>