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



    .tb-hover tr:hover td {
        background-color: #00ff6a48 !important;
        font-weight: bold;
    }

    .tb-hover .active td {
        background-color: #f50c0c;
        font-weight: bold;
        color: #fff;
    }
</style>

<?php
class caltax
{
    private $net;

    public function __construct($para_income)
    {
        $this->net = $para_income;
    } // End const
    public function calculatortax()
    {
        $tax = 0;
        if ($this->net <= 150000)
            $tax = 0;
        elseif ($this->net <= 300000)
            $tax = ($this->net - 150000) * 5 / 100; //7,500
        elseif ($this->net <= 500000)
            $tax = ($this->net - 300000) * 10 / 100 + 7500; //27,500
        elseif ($this->net <= 750000)
            $tax = ($this->net - 500000) * 15 / 100 + 27500; //37,500
        elseif ($this->net <= 1000000)
            $tax = ($this->net - 750000) * 20 / 100 + 37500; //50,000
        elseif ($this->net <= 2000000)
            $tax = ($this->net - 1000000) * 25 / 100 + 50000;//36,5000
        elseif ($this->net <= 5000000)
            $tax = ($this->net - 2000000) * 30 / 100 + 365000;//12,65000
        else
            $tax = ($this->net - 5000000) * 35 / 100 + 1265000;
        return $tax;
    } // End function calculatortax
} // End Class


$tax = 0;

if (isset($_POST["cal"]) =="POST") {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $net_ic = $_POST['net_ic'];
    $ob_tax = new caltax($net_ic);
    $tax = $ob_tax->calculatortax();
}
?>


<div class="container-fluid pt-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 justify-content-center mt-0">
        <h2 class="fw-bold text-center mt-3 mb-0">คำนวณภาษี OOP</h2>
        <div class="col-12 col-lg-5 d-flex justify-content-center mt-0">
            <div class="d-flex justify-content-center align-items-center input-group">
                <form class="form" action="" method="post">
                    <label class="pt-2" for="emp_id">รหัสพนักงาน</label>
                    <input type="number" class="form-control" name="emp_id" placeholder="กรุณากรอกรหัสพนักงาน">
                    <label class="pt-2" for="emp_name">ชื่อพนักงาน</label>
                    <input type="text" class="form-control" name="emp_name" value="Mr.Chayakorn Phukhiao"
                        placeholder="กรุณากรอกชื่อพนักงาน">
                    <label class="pt-2" for="net_ic">รายได้สุทธิ</label>
                    <input type="number" class="form-control" name="net_ic" placeholder="กรุณากรอกรายได้สุทธิ" required>
                    <div class="button d-flex">
                        <button type="button" class="col-5 btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#cal1">code</button>
                        <button type="submit" name="cal" class="col-6 btn btn-success">คำนวณ</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-5 d-flex justify-content-center border-2 border-dark border-end mt-3">
            <table class="table tb-hover">
                <thead>
                    <tr class="text-center">
                        <th class="col">เงินได้สุทธิ (บาท)</th>
                        <th class="col">อัตราภาษี</th>
                        <th class="col">ขั้นภาษี</th>
                        <th class="col">สะสมสูงสุด</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr class="<?php echo ($net_ic >= 1 && $net_ic <= 150000) ? 'active' : ''; ?>">
                        <td>1 - 150,000</td>
                        <td>ได้รับยกเว้น</td>
                        <td> 0</td>
                        <td> 0</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 150000 && $net_ic <= 300000) ? 'active' : ''; ?>">
                        <td>150,001 - 300,000</td>
                        <td>5%</td>
                        <td>7,500</td>
                        <td>7,500</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 300000 && $net_ic <= 500000) ? 'active' : ''; ?>">
                        <td>300,001 - 500,000</td>
                        <td>10%</td>
                        <td>20,000</td>
                        <td>27,500</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 500000 && $net_ic <= 750000) ? 'active' : ''; ?>">
                        <td>500,001 - 750,000</td>
                        <td>15%</td>
                        <td>37,500</td>
                        <td>65,000</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 750000 && $net_ic <= 1000000) ? 'active' : ''; ?>">
                        <td>750,001 - 1,000,000</td>
                        <td>20%</td>
                        <td>50,000</td>
                        <td>115,000</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 1000000 && $net_ic <= 2000000) ? 'active' : ''; ?>">
                        <td>1,000,001 - 2,000,000</td>
                        <td>25%</td>
                        <td>250,000</td>
                        <td>365,000</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 2000000 && $net_ic <= 5000000) ? 'active' : ''; ?>">
                        <td>2,000,001 - 5,000,000</td>
                        <td>30%</td>
                        <td>900,000</td>
                        <td>1,265,000</td>
                    </tr>
                    <tr class="<?php echo ($net_ic > 5000000) ? 'active' : ''; ?>">
                        <td>5,000,001 บาทขึ้นไป</td>
                        <td>35%</td>
                        <td>ไม่จำกัด</td>
                        <td>ไม่จำกัด</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Modal source code-->
<div class="modal fade" id="cal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"> Source Code</h5>
            </div>
            <div class="modal-body">
                <pre id="source">
                    <code id="code-block" class="language-html ">
&lt;style&gt;
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

    :not(pre)&gt;code[class*=language-],
    pre[class*=language-] {
        background-color: #ffff;
    }



    .tb-hover tr:hover td {
        background-color: #00ff6a48 !important;
        font-weight: bold;
    }

    .tb-hover .active td {
        background-color: #f50c0c;
        font-weight: bold;
        color: #fff;
    }
&lt;/style&gt;

&lt;?php
class caltax
{
    private $net;

    public function __construct($para_income)
    {
        $this-&gt;net = $para_income;
    } // End const
    public function calculatortax()
    {
        $tax = 0;
        if ($this-&gt;net &lt;= 150000)
            $tax = 0;
        elseif ($this-&gt;net &lt;= 300000)
            $tax = ($this-&gt;net - 150000) * 5 / 100; //7,500
        elseif ($this-&gt;net &lt;= 500000)
            $tax = ($this-&gt;net - 300000) * 10 / 100 + 7500; //27,500
        elseif ($this-&gt;net &lt;= 750000)
            $tax = ($this-&gt;net - 500000) * 15 / 100 + 27500; //37,500
        elseif ($this-&gt;net &lt;= 1000000)
            $tax = ($this-&gt;net - 750000) * 20 / 100 + 37500; //50,000
        elseif ($this-&gt;net &lt;= 2000000)
            $tax = ($this-&gt;net - 1000000) * 25 / 100 + 50000;//36,5000
        elseif ($this-&gt;net &lt;= 5000000)
            $tax = ($this-&gt;net - 2000000) * 30 / 100 + 365000;//12,65000
        else
            $tax = ($this-&gt;net - 5000000) * 35 / 100 + 1265000;
        return $tax;
    } // End function calculatortax
} // End Class


$tax = 0;
if (isset($_POST["cal"]) =="POST") {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $net_ic = $_POST['net_ic'];
    $ob_tax = new caltax($net_ic);
    $tax = $ob_tax-&gt;calculatortax();
}
?&gt;

&lt;div class="container-fluid pt-5"&gt;
    &lt;div class="row flex-lg-row-reverse align-items-center g-5 justify-content-center mt-0"&gt;
        &lt;h2 class="fw-bold text-center mt-3 mb-0"&gt;คำนวณภาษี OOP&lt;/h2&gt;
        &lt;div class="col-12 col-lg-5 d-flex justify-content-center mt-0"&gt;
            &lt;div class="d-flex justify-content-center align-items-center input-group"&gt;
                &lt;form class="form" action="" method="post"&gt;
                    &lt;label class="pt-2" for="emp_id"&gt;รหัสพนักงาน&lt;/label&gt;
                    &lt;input type="number" class="form-control" name="emp_id" placeholder="กรุณากรอกรหัสพนักงาน"&gt;
                    &lt;label class="pt-2" for="emp_name"&gt;ชื่อพนักงาน&lt;/label&gt;
                    &lt;input type="text" class="form-control" name="emp_name" value="Mr.Chayakorn Phukhiao"
                        placeholder="กรุณากรอกชื่อพนักงาน"&gt;
                    &lt;label class="pt-2" for="net_ic"&gt;รายได้สุทธิ&lt;/label&gt;
                    &lt;input type="number" class="form-control" name="net_ic" placeholder="กรุณากรอกรายได้สุทธิ" required&gt;
                    &lt;div class="button d-flex"&gt;
                        &lt;button type="button" class="col-5 btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#cal1"&gt;code&lt;/button&gt;
                        &lt;button type="submit" name="cal" class="col-6 btn btn-success"&gt;คำนวณ&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="col-12 col-lg-5 d-flex justify-content-center border-2 border-dark border-end mt-3"&gt;
            &lt;table class="table tb-hover"&gt;
                &lt;thead&gt;
                    &lt;tr class="text-center"&gt;
                        &lt;th class="col"&gt;เงินได้สุทธิ (บาท)&lt;/th&gt;
                        &lt;th class="col"&gt;อัตราภาษี&lt;/th&gt;
                        &lt;th class="col"&gt;ขั้นภาษี&lt;/th&gt;
                        &lt;th class="col"&gt;สะสมสูงสุด&lt;/th&gt;
                    &lt;/tr&gt;
                &lt;/thead&gt;
                &lt;tbody class="table-group-divider"&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt;= 1 && $net_ic &lt;= 150000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;1 - 150,000&lt;/td&gt;
                        &lt;td&gt;ได้รับยกเว้น&lt;/td&gt;
                        &lt;td&gt; 0&lt;/td&gt;
                        &lt;td&gt; 0&lt;/td&gt;
                    &lt;/tr&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt; 150000 && $net_ic &lt;= 300000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;150,001 - 300,000&lt;/td&gt;
                        &lt;td&gt;5%&lt;/td&gt;
                        &lt;td&gt;7,500&lt;/td&gt;
                        &lt;td&gt;7,500&lt;/td&gt;
                    &lt;/tr&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt; 300000 && $net_ic &lt;= 500000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;300,001 - 500,000&lt;/td&gt;
                        &lt;td&gt;10%&lt;/td&gt;
                        &lt;td&gt;20,000&lt;/td&gt;
                        &lt;td&gt;27,500&lt;/td&gt;
                    &lt;/tr&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt; 500000 && $net_ic &lt;= 750000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;500,001 - 750,000&lt;/td&gt;
                        &lt;td&gt;15%&lt;/td&gt;
                        &lt;td&gt;37,500&lt;/td&gt;
                        &lt;td&gt;65,000&lt;/td&gt;
                    &lt;/tr&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt; 750000 && $net_ic &lt;= 1000000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;750,001 - 1,000,000&lt;/td&gt;
                        &lt;td&gt;20%&lt;/td&gt;
                        &lt;td&gt;50,000&lt;/td&gt;
                        &lt;td&gt;115,000&lt;/td&gt;
                    &lt;/tr&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt; 1000000 && $net_ic &lt;= 2000000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;1,000,001 - 2,000,000&lt;/td&gt;
                        &lt;td&gt;25%&lt;/td&gt;
                        &lt;td&gt;250,000&lt;/td&gt;
                        &lt;td&gt;365,000&lt;/td&gt;
                    &lt;/tr&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt; 2000000 && $net_ic &lt;= 5000000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;2,000,001 - 5,000,000&lt;/td&gt;
                        &lt;td&gt;30%&lt;/td&gt;
                        &lt;td&gt;900,000&lt;/td&gt;
                        &lt;td&gt;1,265,000&lt;/td&gt;
                    &lt;/tr&gt;
                    &lt;tr class="&lt;?php echo ($net_ic &gt; 5000000) ? 'active' : ''; ?&gt;"&gt;
                        &lt;td&gt;5,000,001 บาทขึ้นไป&lt;/td&gt;
                        &lt;td&gt;35%&lt;/td&gt;
                        &lt;td&gt;ไม่จำกัด&lt;/td&gt;
                        &lt;td&gt;ไม่จำกัด&lt;/td&gt;
                    &lt;/tr&gt;
                &lt;/tbody&gt;
            &lt;/table&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;!--Modal source code--&gt;
&lt;div class="modal fade" id="cal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"&gt;
    &lt;div class="modal-dialog modal-lg"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h5 class="modal-title" id="exampleModalCenterTitle"&gt; Source Code&lt;/h5&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                &lt;pre id="source"&gt;
                            &lt;code id="code-block" class="language-html "&gt;

                            &lt;/code&gt;
                        &lt;/pre&gt;
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-danger" data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;


&lt;div class="modal fade" id="oop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"&gt;
    &lt;div class="modal-dialog modal-dialog-centered"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h1 class="modal-title fs-5" id="exampleModalLabel"&gt;ผลการคำนวณภาษี&lt;/h1&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                &lt;label class="pt-2"&gt;รหัสพนักงาน&lt;/label&gt;
                &lt;input type="text" class="form-control" value="&lt;?php echo $emp_id ?&gt;" disabled&gt;
                &lt;label class="pt-2"&gt;ชื่อพนักงาน&lt;/label&gt;
                &lt;input type="text" class="form-control" value="&lt;?php echo $emp_name ?&gt;" disabled&gt;
                &lt;div class="row"&gt;
                    &lt;div class="col-6"&gt;
                        &lt;label class="pt-2"&gt;รายได้สุทธิ&lt;/label&gt;
                        &lt;input type="text" class="form-control" value="&lt;?php echo number_format($net_ic) . ' บาท' ?&gt;"
                            disabled&gt;
                    &lt;/div&gt;
                    &lt;div class="col-6"&gt;
                        &lt;label class="pt-2"&gt;ภาษี&lt;/label&gt;
                        &lt;input type="text" class="form-control" value="&lt;?php echo number_format($tax) . ' บาท'; ?&gt;"
                            disabled&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary" data-bs-dismiss="modal"&gt;ปิด&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;


&lt;?php if (isset($_POST["cal"]) =="POST"): ?&gt;
    &lt;script&gt;
        document.addEventListener('DOMContentLoaded', function () {
            const oopModal = new bootstrap.Modal(document.getElementById('oop'));
            oopModal.show();
        });
    &lt;/script&gt;
&lt;?php endif; ?&gt;
                    </code>
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="oop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ผลการคำนวณภาษี</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="pt-2">รหัสพนักงาน</label>
                <input type="text" class="form-control" value="<?php echo $emp_id ?>" disabled>
                <label class="pt-2">ชื่อพนักงาน</label>
                <input type="text" class="form-control" value="<?php echo $emp_name ?>" disabled>
                <div class="row">
                    <div class="col-6">
                        <label class="pt-2">รายได้สุทธิ</label>
                        <input type="text" class="form-control" value="<?php echo number_format($net_ic) . ' บาท' ?>"
                            disabled>
                    </div>
                    <div class="col-6">
                        <label class="pt-2">ภาษี</label>
                        <input type="text" class="form-control" value="<?php echo number_format($tax) . ' บาท'; ?>"
                            disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>


<?php if (isset($_POST["cal"]) =="POST"): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const oopModal = new bootstrap.Modal(document.getElementById('oop'));
            oopModal.show();
        });
    </script>
<?php endif; ?>