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
        max-height: 500px;
        overflow-y: auto;
    }

    #source {
        font-size: 13px;
    }

    :not(pre)>code[class*=language-],
    pre[class*=language-] {
        background-color: #ffff;
    }

    .table-hover tr:hover td {
        background-color: #00ff6a48 !important;
        font-weight: bold;
    }

    td {
        align-items: center;
        text-align: center;
    }
</style>

<?php

require_once("my_tax.php"); 
require_once("vat.php");  
require_once("tax.php");   

class CalIncome {

    public function NetIncome($salary,$tax){
        $netincome = $salary - $tax;
        return $netincome;
    }

}

if (isset($_POST['cal'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $income = $_POST['income'];

    $calvat = new Vat($income);
    $vat = $calvat->calculateTax();  
    
    $calsalary = new CalIncome();
    $salary = $income *  12;  
    
    $caltax = new IncomeTax($salary);
    $incomeTax = $caltax->calculateTax(); 
    
    $netincome = $calsalary->NetIncome($salary,$incomeTax);

    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            title: 'ผลการคำนวณเกรด',
            html: `
            <hr>
            <div class='d-flex justify-content-around align-items-center'>
                <div>
                    <p class='text-start'><strong>รหัสนักศึกษา:</strong></p>
                    <p class='text-start'><strong>ชื่อ-สกุล:</strong></p>
                    <p class='text-start'><strong>เงินเดือน:</strong></p>
                    <p class='text-start'><strong>ค่า VAT :</strong></p>
                    <p class='text-start'><strong>เงินเดือนทั้งหมด:</strong></p>
                    <p class='text-start'><strong>ค่าภาษี:</strong></p>
                </div>
                <div>
                    <p class='text-end'>$code</p>
                    <p class='text-end'>$name</p>
                    <p class='text-end'>" . number_format( $income)." บาท</p>
                    <p class='text-end'>" . number_format( $vat)." บาท</p>
                    <p class='text-end'>" . number_format( $salary)." บาท</p>
                    <p class='text-end'>" . number_format( $incomeTax)." บาท</p>
                </div>
            </div>
            <hr>
                <h1 class='text-danger'><strong>รายได้สุทธิ : " . number_format($netincome)." บาท </strong></h1>
            `,
            width: 600,
            padding: '2em',
            color: '#716add',
            background: '#fff url(/images/trees.png)',
            backdrop: `
                rgba(0,0,123,0.5)
                url('../images/nyan-cat.gif')
                left top
                no-repeat
            `,
            showConfirmButton: false,
        });
    </script>";
}
?>

<div class="container-fluid pt-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 justify-content-center mt-0">
        <h2 class="fw-bold text-center mt-3 mb-5">คำนวณภาษีแบบถ่ายทอด class</h2>
        <div class="col-12 col-lg-6 d-flex justify-content-center mt-0">
            <div class="d-flex justify-content-center align-items-center input-group">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="code" class="form-label fw-bold">รหัสนักศึกษา</label>
                            <input type="text" class="form-control" id="code" name="code"
                                placeholder="กรุณาป้อนรหัสนักศึกษา" value="65642206019-3">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label fw-bold">ชื่อ-สกุล</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="กรุณาป้อนชื่อ-สกุล" value="นายชยากร ภูเขียว">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-12">
                            <label for="income" class="form-label fw-bold">เงินเดือน</label>
                            <input type="number" class="form-control" id="income" name="income"
                                placeholder="กรุณาป้อนเงินเดือน" required>
                        </div>
                    </div>
                    <div class="button d-flex justify-content-between">
                        <button type="button" class="col-5 btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#cal1">Source Code</button>
                        <button type="submit" name="cal" class="col-6 btn btn-success">คำนวณ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="cal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                    File name: <span class="text-danger">________</span>
                </h5>
                <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                    style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                    onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                    onmouseout="this.style.transform='translate3d(0, 0, 0)'" 
                    data-bs-placement="top" data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว"
                    onclick="copyCode()">
                    <span class="material-symbols-outlined">content_copy</span>
                </button>
            </div>
            <div class="modal-body">
                <pre id="source">
                    <code id="code-block" class="language-html ">
                    </code>
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    });

    function copyCode() {
        const code = document.getElementById('code-block').innerText;
        navigator.clipboard.writeText(code)
    }
</script>


