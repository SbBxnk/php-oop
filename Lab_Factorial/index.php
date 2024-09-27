<style>
    .form {
        padding: 20px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 600px;
    }

    .container-sm {
        max-width: 1000px;
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

    .result-number {
        font-size: 4.5rem;
        margin: 0px;
        padding: 0;
    }

    @media screen and (max-width: 550px) {
        .result {
            margin-top: 2rem;
        }
    }
</style>
<?php
require_once("lab_oop_factorial.php");

function selectList($list, $N)
{
    $c = 0;
    if ($list == "oop") {
        $fac = new factorial($N);
        $c = $fac->calculate();
    } elseif ($list == "recursive") {
        $fac = new Rec_factorial($N);
        $c = $fac->calculate();
    } elseif ($list == "square") {
        $square = new Square($N);
        $c = $square->calculate();
    } elseif ($list == "circle") {
        $circle = new Circle($N, null);
        $c = $circle->calculate();
    }
    return $c;
}

if (isset($_POST['submit'])) {
    $list = $_POST['list'];
    $N = $_POST['N'];
    $result = selectList($list, $N);
}
?>
<div class="container-fluid py-5">
    <h2 class="fw-bold text-center my-4 text-muted">Prarent/Child <span class="text-danger fw-bold">"Factorial "</span>
        Lab</h2>
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-3 card rounded-3 shadow-sm">
            <form class="form" action="" method="post">
                <label class="pt-2" for="a">Enter Number</label>
                <input type="number" class="form-control" name="N" placeholder="กรุณากรอก Number"
                    value="<?php echo isset($N) ? $N : ''; ?>" required>
                <label class="pt-2" for="list">Select</label>
                <select name="list" class="form-select" required>
                    <option value="oop" <?php echo (isset($list) && $list == 'oop') ? 'selected' : ''; ?>>Factorial OOP
                    </option>
                    <option value="recursive" <?php echo (isset($list) && $list == 'recursive') ? 'selected' : ''; ?>>
                        Factorial Recursive</option>
                    <option value="square" <?php echo (isset($list) && $list == 'square') ? 'selected' : ''; ?>>Find the
                        area of ​​a square</option>
                    <option value="circle" <?php echo (isset($list) && $list == 'circle') ? 'selected' : ''; ?>>Find the
                        area of ​​a circle</option>
                </select>
                <div class="button d-flex justify-content-between">
                    <button type="button" class="col-5 btn-sm btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#prarent">Source Code</button>
                    <button type="submit" name="submit" class="col-6 btn-sm btn btn-success">คำนวณ</button>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-5">
            <div class="result d-flex justify-content-center align-items-center" style="height: 100%;">
                <div class="text-center">
                    <p>
                        <?php
                        if (isset($list)) {
                            if ($list == "oop") {
                                ?>
                            <div class="container">
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    <span class="text-danger fw-bold">"Object-Oriented Programming"</span> is selected
                                </h4>
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    Factorial number
                                    <span class="text-danger fw-bold"><?php echo $N ?>!</span>
                                    is
                                </h4>
                                <p class="result-number text-success fw-bold"><?php echo number_format($result) ?></p>
                                <button type="button" class="btn-sm col-5 btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#oop">code</button>
                            </div>
                            <?php
                            } elseif ($list == "recursive") {
                                ?>
                            <div class="container">
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    <span class="text-danger fw-bold">"Recursive Function"</span> is selected
                                </h4>
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    Factorial number
                                    <span class="text-danger fw-bold"><?php echo $N ?>!</span>
                                    is
                                </h4>
                                <p class="result-number text-success fw-bold"><?php echo number_format($result) ?></p>
                                <button type="button" class="btn-sm col-5 btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#recursive">code</button>
                            </div>
                            <?php
                            } elseif ($list == "square") {
                                ?>
                            <div class="container">
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    <span class="text-danger fw-bold">"Find the area of a square"</span> is selected
                                </h4>
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    Area of square
                                    <span class="text-danger fw-bold"><?php echo $N ?></span> x
                                    <span class="text-danger fw-bold"><?php echo $N ?></span>
                                    is
                                </h4>
                                <div class="d-flex align-items-end justify-content-center">
                                    <p class="result-number text-success fw-bold"><?php echo number_format($result) ?></p>
                                    <h3 class="text-muted fw-bold pb-3">&nbsp;Unit</h3>
                                </div>
                                <button type="button" class="btn-sm col-5 btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#square">code</button>
                            </div>

                            <?php
                            } elseif ($list == "circle") {
                                ?>
                            <div class="container">
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    <span class="text-danger fw-bold">"Find the area of a circle"</span> is selected
                                </h4>
                                <h4 class="fw-bold text-center my-0 text-muted">
                                    Area of circle
                                    <span class="text-danger fw-bold">3.14</span> x
                                    <span class="text-danger fw-bold"><?php echo $N ?><sup>2</sup></span>
                                    is
                                </h4>
                                <div class="d-flex align-items-end justify-content-center">
                                    <p class="result-number text-success fw-bold"><?php echo number_format($result, 2) ?></p>
                                    <h3 class="text-muted fw-bold pb-3">&nbsp;Unit</h3>
                                </div>
                                <button type="button" class="btn-sm col-5 btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#circle">code</button>
                            </div>

                            <?php
                            }
                        } else {
                            ?>
                        <h1 class='text-center'>กรุณาป้อน <span class="text-danger">"Number"</span></h1>
                        <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="prarent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                        File name: <span class="text-danger">Prarent Class</span>
                    </h5>
                    <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                        style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                        onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                        onmouseout="this.style.transform='translate3d(0, 0, 0)'" data-bs-placement="top"
                        data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว" onclick="copyCode()">
                        <span class="material-symbols-outlined">content_copy</span>
                    </button>
                </div>
                <div class="modal-body">
                    <pre id="source">
                    <code id="code-block" class="language-html ">
&lt;?php 
class MathOperation
{
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function calculate()
    {
        return "No calculation defined in MathOperation class.";
    }
}
?&gt;
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                        File name: <span class="text-danger">Object-Oriented Programming</span>
                    </h5>
                    <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                        style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                        onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                        onmouseout="this.style.transform='translate3d(0, 0, 0)'" data-bs-placement="top"
                        data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว" onclick="copyCode()">
                        <span class="material-symbols-outlined">content_copy</span>
                    </button>
                </div>
                <div class="modal-body">
                    <pre id="source">
                    <code id="code-block" class="language-html ">
&lt;?php 
class factorial extends MathOperation
{
    public function calculate()
    {
        $F = 1;
        $K = $this-&gt;number;
        while ($K &gt; 1) {
            $F = $F * $K;
            $K = $K - 1;
        }
        return $F;
    }
}
?&gt;
                    </code>
                </pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="recursive" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                        File name: <span class="text-danger">Recursive Function</span>
                    </h5>
                    <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                        style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                        onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                        onmouseout="this.style.transform='translate3d(0, 0, 0)'" data-bs-placement="top"
                        data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว" onclick="copyCode()">
                        <span class="material-symbols-outlined">content_copy</span>
                    </button>
                </div>
                <div class="modal-body">
                    <pre id="source">
                    <code id="code-block" class="language-html ">
&lt;?php 
class Rec_factorial extends MathOperation
{
    public function calculate()
    {
        return $this-&gt;cal_factorial($this-&gt;number);
    }
    private function cal_factorial($N)
    {
        if ($N == 0 || $N == 1)
            return 1;
        else
            return $N * $this-&gt;cal_factorial($N - 1);
    }
}
?&gt;
                    </code>
                </pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="square" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                        File name: <span class="text-danger">Square Area</span>
                    </h5>
                    <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                        style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                        onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                        onmouseout="this.style.transform='translate3d(0, 0, 0)'" data-bs-placement="top"
                        data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว" onclick="copyCode()">
                        <span class="material-symbols-outlined">content_copy</span>
                    </button>
                </div>
                <div class="modal-body">
                    <pre id="source">
                    <code id="code-block" class="language-html ">
&lt;?php 
class Square extends MathOperation
{
    public function calculate()
    {
        return $this->number * $this->number;
    }
}
?&gt;

                    </code>
                </pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="circle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                        File name: <span class="text-danger">Circle Area</span>
                    </h5>
                    <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                        style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                        onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                        onmouseout="this.style.transform='translate3d(0, 0, 0)'" data-bs-placement="top"
                        data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว" onclick="copyCode()">
                        <span class="material-symbols-outlined">content_copy</span>
                    </button>
                </div>
                <div class="modal-body">
                    <pre id="source">
                    <code id="code-block" class="language-html ">
&lt;?php 
class Circle extends MathOperation
{
    public function calculate()
    {
        return pi() *  pow($this->number,2);
    }
}
?&gt;
                    </code>
                </pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>