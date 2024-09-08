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
        <div class="d-flex justify-content-between align-items-start main mt-1 flex-wrap gap-3">
            <div class="col-12 col-md-5 box-div flex-column d-flex mb-3 mb-md-0">
                <div class="code-container">
                    <div class="d-flex justify-content-between border-bottom border-2 px-2 py-1">
                        <h4 class="fw-bold text-danger">Parent class file : <span
                                class="text-secondary">shape_class.php</span></h4>
                        <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                            style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                            onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                            onmouseout="this.style.transform='translate3d(0, 0, 0)'" 
                            data-bs-placement="top" data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว"
                            onclick="copyCode()">
                            <span class="material-symbols-outlined">content_copy</span>
                        </button>
                    </div>
                    <pre id="source">
                        <code id="shape_class" class="language-html">
&lt;?php
        class Shape{
            private $name;
            
            public function __construct($name)
            {
                $this-&gt;name = $name;
            }
            public function setName($name)
            {
                $this-&gt;name = $name;
            }
            public function getName()
            {
                return $this-&gt;name;
            }
        }
?&gt;
                        </code>
                    </pre>
                </div>
            </div>

            <div class="col-12 col-md-6 box-div d-flex flex-column my-4">
            <h2 class="fw-bold text-danger">Child class</h2>
                <div class="d-flex justify-content-between my-3 gap-3">
                    <div class="">
                        <?php require_once('rectangle.php') ?>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rectangle">source code</button>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-2 gap-3">
                    <div class="">
                        <?php require_once('triangle.php') ?>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#triangle">source code</button>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-2 gap-3">
                    <div class="">
                        <?php require_once('circle.php') ?>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#circle">source code</button>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

<!--rectangle modal-->
<div class="modal fade" id="rectangle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                    Child class file: <span class="text-danger">rectangle.php</span>
                </h5>
                <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                    style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                    onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                    onmouseout="this.style.transform='translate3d(0, 0, 0)'" 
                    data-bs-placement="top" data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว"
                    onclick="copyRectangle()">
                    <span class="material-symbols-outlined">content_copy</span>
                </button>
            </div>
            <div class="modal-body">
                <pre id="source">
                    <code id="rectangle" class="language-html">
&lt;?php
require_once('shape_class.php');
class Rectangle extends shape{
    private $width;
    private $height;
    public function __construct($name, $width, $height)
    {
        parent::__construct($name);
        $this-&gt;width = $width;
        $this-&gt;height = $height;
    }
    public function setWidth($width)
    {
        $this-&gt;width = $width;
    }
    public function setHeight($height)
    {
        $this-&gt;height = $height;
    }

    public function getWidth()
    {
        return $this-&gt;width;
    }
    public function getheight()
    {
        return $this-&gt;height;
    }
    public function getArea()
    {
        return $this-&gt;width * $this-&gt;height;
    }
}

$rectangle = new Rectangle("My Rectangle", 10, 5);
$rectangleArea = $rectangle-&gt;getArea();
?&gt;

&lt;h4&gt;The area of the &lt;span class="text-danger fw-bold"&gt;&lt;?php echo $rectangle-&gt;getName() ?&gt;&lt;/span&gt;&lt;/h4&gt;
&lt;p class="my-0"&gt;width = &lt;?php echo $rectangle-&gt;getwidth() ?&gt; Unit&lt;/p&gt;
&lt;p class="my-0"&gt;height = &lt;?php echo $rectangle-&gt;getheight() ?&gt; Unit&lt;/p&gt;
&lt;p class="my-0"&gt;Area = &lt;?php echo number_format($rectangleArea, 2) ?&gt; Square unit&lt;/p&gt;
                    </code>
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!--triangle modal-->
<div class="modal fade" id="triangle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                    Child class file: <span class="text-danger">triangle.php</span>
                </h5>
                <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                    style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                    onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                    onmouseout="this.style.transform='translate3d(0, 0, 0)'" 
                    data-bs-placement="top" data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว"
                    onclick="copyTriangle()">
                    <span class="material-symbols-outlined">content_copy</span>
                </button>
            </div>
            <div class="modal-body">
                <pre id="source">
                    <code id="triangle" class="language-html">
&lt;?php
require_once("shape_class.php");
 class Triangle extends shape{
    private $width;
    private $height;
    public function __construct($name,$width, $height) {  
        parent::__construct($name);
        $this-&gt;width = $width;
        $this-&gt;height = $height;
    }
    public function setWidth($width) {
        $this-&gt;width = $width;
    }
    public function setHeight($height) {
        $this-&gt;height = $height;
    }

    public function getWidth() {
        return $this-&gt;width;
    }
    public function getHeight() {
        return $this-&gt;height;
    }
    public function getArea() {
        return 1/2 * $this-&gt;width * $this-&gt; height;
    }
 }

$triangle =  new Triangle("My Triangle",10,5);
$triangleArea = $triangle-&gt;getArea();
?&gt;

&lt;h4&gt;The area of  the &lt;span class="text-danger fw-bold"&gt;&lt;?php echo $triangle-&gt;getName() ?&gt;&lt;/span&gt;&lt;/h4&gt;
&lt;p class="my-0"&gt;width = &lt;?php echo $triangle-&gt;getwidth()?&gt; Unit&lt;/p&gt;
&lt;p class="my-0"&gt;height = &lt;?php echo $triangle-&gt;getheight()?&gt; Unit&lt;/p&gt;
&lt;p class="my-0"&gt;Area =  &lt;?php echo number_format($triangleArea,2)?&gt; Square unit&lt;/p&gt;
                    </code>
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!--circle modal-->
<div class="modal fade" id="circle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title fw-bold text-m text-muted" id="exampleModalCenterTitle">
                    Child class file: <span class="text-danger">circle.php</span>
                </h5>
                <button id="copy-button" class="copy-btn border-0 bg-transparent text-body-tertiary"
                    style="transition: transform 0.2s; --bs-icon-link-transform: translate3d(0, 0, 0);"
                    onmouseover="this.style.transform='translate3d(0, -0.125rem, 0)'"
                    onmouseout="this.style.transform='translate3d(0, 0, 0)'" 
                    data-bs-placement="top" data-bs-toggle="popover" data-bs-content="คัดลอกแล้ว"
                    onclick="copyCircle()">
                    <span class="material-symbols-outlined">content_copy</span>
                </button>
            </div>
            <div class="modal-body">
                <pre id="source">
                    <code id="circle" class="language-html">
&lt;?php
require_once("shape_class.php");
 class Circle extends shape{
    private $radius;
    public function __construct($name,$radius) {  
        parent::__construct($name);
        $this-&gt;radius = $radius;
    }
    public function getRadius() {
        return $this-&gt;radius;
    }
    public function getArea() {
        return pi() * $this-&gt; radius **2;
    }
 }

$circle =  new Circle("My Circle",5);
$circleArea = $circle-&gt;getArea();
?&gt;

&lt;h4&gt;The area of  the &lt;span class="text-danger fw-bold"&gt;&lt;?php echo $circle-&gt;getName() ?&gt;&lt;/span&gt;&lt;/h4&gt;
&lt;p class="my-0"&gt;Radius = &lt;?php echo $circle-&gt;getRadius()?&gt; Unit&lt;/p&gt;
&lt;p class="my-0"&gt;Area =  &lt;?php echo number_format($circleArea,2)?&gt; Square unit&lt;/p&gt;
                    </code>
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
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
        const code = document.getElementById('shape_class').innerText;
        navigator.clipboard.writeText(code)
    }
 
    function copyRectangle() {
        const codeElement = document.querySelector('#rectangle code');
        const codeText = codeElement ? codeElement.textContent : '';
        navigator.clipboard.writeText(codeText);
    }
    function copyTriangle() {
        const codeElement = document.querySelector('#triangle code');
        const codeText = codeElement ? codeElement.textContent : '';
        navigator.clipboard.writeText(codeText);
    }
    function copyCircle() {
        const codeElement = document.querySelector('#circle code');
        const codeText = codeElement ? codeElement.textContent : '';
        navigator.clipboard.writeText(codeText);
    }
</script>
