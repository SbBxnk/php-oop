<style>
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

    .code-container {
        width: 100%;
        position: relative;
        border-radius: 8px;
        background-color: #ffffff;
        overflow: hidden;
        padding: 10px;
        margin: 20px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 576px) {
        .box-div {
            flex-direction: column !important;
        }

        .code-container {
            width: 100%;

        }

        .main {
            flex-direction: column;
        }

        h4 {
            font-size: 15px;
        }
    }
</style>

<div class="container-fluid py-5">
    <div class="container-sm rounded-3 ">
    <div class="d-flex align-items-center gap-2 gap-sm-3 gap-md-4 gap-lg-5">
            <div class="d-flex align-items-center">
                <h2 class="fw-bold text-danger">Result :</h2>
            </div>
            <div class="">
                <div class="">
                    <?php require_once('PercentageGrade.php') ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-start main mt-1 flex-wrap gap-3">
            <div class="col-12 col-md-5 box-div flex-column d-flex mb-3 mb-md-0">
                <div class="code-container">
                    <div class="d-flex justify-content-between border-bottom border-2 px-2 py-1">
                        <h4 class="fw-bold text-danger">Parent class file : <span
                                class="text-secondary">Grade.php</span></h4>
                        <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                            style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                            onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                            onmouseout="this.style.transform='translate3d(0, 0, 0)'" data-bs-placement="top"
                            data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว" onclick="Grade()">
                            <span class="material-symbols-outlined">content_copy</span>
                        </button>
                    </div>
                    <pre id="source">
                        <code id="grade" class="language-html">
&lt;?php 
class Grade{
    protected $studentName;
    
    private $grade;
    
    public function __construct($studentName){
        $this-&gt;studentName = $studentName;
    }
    public function getName(){
        return $this-&gt;studentName;
    }
    public function Grade($score){
        if ($score &gt;= 90){
            $this-&gt;grade = "A";
        } elseif ($score &gt;= 80 ){
            $this-&gt;grade = "B";
        } elseif ($score &gt;= 70){
            $this-&gt;grade = "C";
        } elseif ($score &gt;= 60 ){
            $this-&gt;grade = "D";
        }else{
            $this-&gt;grade = "F";
        }
        return $this-&gt;grade;
    }
}
?&gt;
                        </code>
                    </pre>
                </div>
            </div>
            <div class="col-12 col-md-6 box-div flex-column d-flex mb-3 mb-md-0">
                <div class="code-container">
                    <div class="d-flex justify-content-between border-bottom border-2 px-2 py-1">
                        <h4 class="fw-bold text-danger">Child class file : <span
                                class="text-secondary">PercentageGrade.php</span></h4>
                        <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                            style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                            onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                            onmouseout="this.style.transform='translate3d(0, 0, 0)'" data-bs-placement="top"
                            data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว" onclick="PercentageGrade()">
                            <span class="material-symbols-outlined">content_copy</span>
                        </button>
                    </div>
                    <pre id="source">
                        <code id="PercentageGrade" class="language-html">
&lt;?php
require_once("grade.php");

class PercentageGrade extends Grade
{
    private $score;
    public function __construct($studentName, $score)
    {
        parent::__construct($studentName);
        $this-&gt;score = $score;
    }
    public function getScore()
    {
        return $this-&gt;score;
    }
}

$studentName = 'Mr.Chayakorn';
$score = 85;
$PercentageGrade = new PercentageGrade($studentName, $score);
$grade = $PercentageGrade-&gt;Grade($score);
?&gt;

&lt;p class="my-0"&gt;The student's &lt;span class="text-danger fw-bold"&gt;&lt;?php echo $PercentageGrade-&gt;getName() ?&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p class="my-0"&gt;Test score is &lt;?php echo $PercentageGrade-&gt;getScore() ?&gt;&lt;/p&gt;
&lt;p class="my-0"&gt;Grade is &lt;?php echo $grade ?&gt;.&lt;/p&gt;
                        </code>
                    </pre>
                </div>
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

    function Grade() {
        const code = document.getElementById('grade').innerText;
        navigator.clipboard.writeText(code)
    }
    function PercentageGrade() {
        const code = document.getElementById('PercentageGrade').innerText;
        navigator.clipboard.writeText(code)
    }

</script>

