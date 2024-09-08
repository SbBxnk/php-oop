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
class CalGrade
{
    private $midterm;
    private $final;
    private $grade;
    public function __construct($midterm, $final)
    {
        $this->midterm = $midterm;
        $this->final = $final;
        $this->grade = '';
    }

    public function getMidterm()
    {
        return $this->midterm;
    }
    public function getFinal()
    {
        return $this->final;
    }

    public function SumTest()
    {
        return $this->midterm + $this->final;
    }

    public function getGrade($total)
    {
        if ($total >= 80) {
            $this->grade = 'A';
        } else if ($total >= 70) {
            $this->grade = 'B';
        } else if ($total >= 60) {
            $this->grade = 'C';
        } else if ($total >= 50) {
            $this->grade = 'D';
        } else {
            $this->grade = 'F';
        }
        return $this->grade;
    }
}


if (isset($_POST['calgrade'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $midterm = $_POST['midterm'];
    $final = $_POST['final'];

    $calgrade = new CalGrade($midterm, $final);
    $total = $calgrade->SumTest();
    $grade = $calgrade->getGrade($total);

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
                    <p class='text-start'><strong>คะแนนกลางภาค:</strong></p>
                    <p class='text-start'><strong>คะแนนปลายภาค:</strong></p>
                    <p class='text-start'><strong>คะแนนรวม:</strong></p>
                </div>
                <div>
                    <p class='text-end'>$code</p>
                    <p class='text-end'>$name</p>
                    <p class='text-end'>$midterm</p>
                    <p class='text-end'>$final</p>
                    <p class='text-end'>$total</p>
                </div>
            </div>
            <hr>
                <h1 class='text-danger'><strong>เกรด $grade</strong></h1>
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
        <h2 class="fw-bold text-center mt-3 mb-0">คำนวณเกรด OOP</h2>
        <div class="col-12 col-lg-6 d-flex justify-content-center mt-0">
            <div class="d-flex justify-content-center align-items-center input-group">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="code" class="form-label fw-bold">รหัสนักศึกษา</label>
                            <input type="text" class="form-control" id="code" name="code"
                                placeholder="กรุณาป้อนรหัสนักศึกษา" value="65642206019-3">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-bold">ชื่อ-สกุล</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="กรุณาป้อนชื่อ-สกุล" value="นายชยากร ภูเขียว">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="midterm" class="form-label fw-bold">คะแนนกลางภาค</label>
                            <input type="number" class="form-control" id="midterm" name="midterm"
                                placeholder="กรุณาป้อนคะแนนกลางภาค" required>
                        </div>
                        <div class="col-md-6">
                            <label for="final" class="form-label fw-bold">คะแนนปลายภาค</label>
                            <input type="number" class="form-control" id="final" name="final"
                                placeholder="กรุณาป้อนคะแนนปลายภาค" required>
                        </div>
                    </div>
                    <div class="button d-flex justify-content-between">
                        <button type="button" class="col-5 btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#cal1">Source Code</button>
                        <button type="submit" name="calgrade" class="col-6 btn btn-success">คำนวณ</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-3 d-flex justify-content-center border-2 border-dark border-end mt-3">
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th class="col">คะแนน</th>
                        <th class="col">เกรด</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>80-100</td>
                        <td class="text-center">A</td>
                    </tr>
                    <tr>
                        <td>70-79</td>
                        <td class="text-center">B</td>
                    </tr>
                    <tr>
                        <td>60-69</td>
                        <td class="text-center">C</td>
                    </tr>
                    <tr>
                        <td>50-59</td>
                        <td class="text-center">D</td>
                    </tr>
                    <tr>
                        <td>0-49</td>
                        <td class="text-center">F</td>
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
        <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                    File name: <span class="text-danger">Cal_grade.php</span>
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
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Cal_grade&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    
&lt;?php
class CalGrade
{
    private $midterm;
    private $final;
    private $grade;
    public function __construct($midterm, $final)
    {
        $this-&gt;midterm = $midterm;
        $this-&gt;final = $final;
        $this-&gt;grade = '';
    }

    public function getMidterm()
    {
        return $this-&gt;midterm;
    }
    public function getFinal()
    {
        return $this-&gt;final;
    }

    public function SumTest()
    {
        return $this-&gt;midterm + $this-&gt;final;
    }

    public function getGrade($total)
    {
        if ($total &gt;= 80) {
            $this-&gt;grade = 'A';
        } else if ($total &gt;= 70) {
            $this-&gt;grade = 'B';
        } else if ($total &gt;= 60) {
            $this-&gt;grade = 'C';
        } else if ($total &gt;= 50) {
            $this-&gt;grade = 'D';
        } else {
            $this-&gt;grade = 'F';
        }
        return $this-&gt;grade;
    }
}


if (isset($_POST['calgrade'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $midterm = $_POST['midterm'];
    $final = $_POST['final'];

    $calgrade = new CalGrade($midterm, $final);
    $total = $calgrade-&gt;SumTest();
    $grade = $calgrade-&gt;getGrade($total);

    echo "
    &lt;script&gt; src='https://cdn.jsdelivr.net/npm/sweetalert2@11'&gt;&lt;/script&gt;
    &lt;script&gt;&gt;
        Swal.fire({
            title: 'ผลการคำนวณเกรด',
            html: `
            &lt;hr&gt;
            &lt;div class='d-flex justify-content-around align-items-center'&gt;
                &lt;div&gt;
                    &lt;p class='text-start'&gt;&lt;strong&gt;รหัสนักศึกษา:&lt;/strong&gt;&lt;/p&gt;
                    &lt;p class='text-start'&gt;&lt;strong&gt;ชื่อ-สกุล:&lt;/strong&gt;&lt;/p&gt;
                    &lt;p class='text-start'&gt;&lt;strong&gt;คะแนนกลางภาค:&lt;/strong&gt;&lt;/p&gt;
                    &lt;p class='text-start'&gt;&lt;strong&gt;คะแนนปลายภาค:&lt;/strong&gt;&lt;/p&gt;
                    &lt;p class='text-start'&gt;&lt;strong&gt;คะแนนรวม:&lt;/strong&gt;&lt;/p&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    &lt;p&gt; class='text-end'&gt;$code&lt;/p&gt;
                    &lt;p&gt; class='text-end'&gt;$name&lt;/p&gt;
                    &lt;p&gt; class='text-end'&gt;$midterm&lt;/p&gt;
                    &lt;p&gt; class='text-end'&gt;$final&lt;/p&gt;
                    &lt;p&gt; class='text-end'&gt;$total&lt;/p&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;hr&gt;
                &lt;h1 class='text-danger'&gt;&lt;strong&gt;เกรด $grade&lt;/strong&gt;&lt;/h1&gt;
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
    &lt;/script&gt;";
}
?&gt;

&lt;div class="row flex-lg-row-reverse align-items-center g-5 justify-content-center mt-0"&gt;
    &lt;h2&gt; class="fw-bold text-center mt-3 mb-0"&gt;คำนวณเกรด OOP&lt;/h2&gt;
    &lt;div class="col-12 col-lg-6 d-flex justify-content-center mt-0"&gt;
        &lt;div class="d-flex justify-content-center align-items-center input-group"&gt;
            &lt;form action="" method="POST"&gt;
                &lt;div class="row mb-3"&gt;
                    &lt;div class="col-md-6"&gt;
                        &lt;label&gt; for="code" class="form-label fw-bold"&gt;รหัสนักศึกษา&lt;/label&gt;
                        &lt;input type="text" class="form-control" id="code" name="code"
                            placeholder="กรุณาป้อนรหัสนักศึกษา" value="65642206019-3"&gt;
                    &lt;/div&gt;
                    &lt;div class="col-md-6"&gt;
                        &lt;label&gt; for="name" class="form-label fw-bold"&gt;ชื่อ-สกุล&lt;/label&gt;
                        &lt;input type="text" class="form-control" id="name" name="name" placeholder="กรุณาป้อนชื่อ-สกุล"
                            value="นายชยากร ภูเขียว"&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="row mb-3"&gt;
                    &lt;div class="col-md-6"&gt;
                        &lt;label&gt; for="midterm" class="form-label fw-bold"&gt;คะแนนกลางภาค&lt;/label&gt;
                        &lt;input type="number" class="form-control" id="midterm" name="midterm"
                            placeholder="กรุณาป้อนคะแนนกลางภาค" required&gt;
                    &lt;/div&gt;
                    &lt;div class="col-md-6"&gt;
                        &lt;label&gt; for="final" class="form-label fw-bold"&gt;คะแนนปลายภาค&lt;/label&gt;
                        &lt;input type="number" class="form-control" id="final" name="final"
                            placeholder="กรุณาป้อนคะแนนปลายภาค" required&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="button d-flex justify-content-between"&gt;
                    &lt;button&gt; type="button" class="col-5 btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#cal1"&gt;Source Code&lt;/button&gt;
                    &lt;button&gt; type="submit" name="calgrade" class="col-6 btn btn-success"&gt;คำนวณ&lt;/button&gt;
                &lt;/div&gt;
            &lt;/form&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
                    
&lt;/body&gt;
&lt;/html&gt;
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