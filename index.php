<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP OOP | ชยากร ภูเขียว</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <!-- code Prism.Js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/themes/prism.min.css" rel="stylesheet" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- script typing -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- custom Css-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- ส่วน navbar -->
    <?php require_once("navbar.html") ?>
    <!-- ส่วนเนื้อหา Content-->
    <div class="container my-5">
        <?php
        if (isset($_GET['p'])) { // 1 : true
            switch ($_GET['p']) {
                    // Home page
                case "home":
                    include("homepage.html");
                    break;
                case "contact":
                    include("contact.html");
                    break;

                    /*Lab01*/
                case "Lab01":
                    include("./Lab01/index.html");
                    break;
                case "Lab01_post1": //action
                    include("./Lab01/Lab01_post01.php");
                    break;
                case "Lab01_post2": //action
                    include("./Lab01/Lab01_post02.php");
                    break;
                case "Lab01_post3": //action
                    include("./Lab01/Lab01_post03.php");
                    break;
                case "Lab1111":
                    include("1111.html");
                    break;
                case "source_Lab01_index":
                    include("./Lab01/source_Lab01_index.html");
                    break;
                case "Lab01_calnum":
                    include("./Lab01/Lab01_calnum.php");
                    break;
                case "source_Lab01_post01":
                    include("./Lab01/source_Lab01_post01.html");
                    break;
                case "source_Lab01_post02":
                    include("./Lab01/source_Lab01_post02.html");
                    break;
                case "source_Lab01_post03":
                    include("./Lab01/source_Lab01_post03.html");
                    break;
                    /*Lab02*/
                case "Lab02":
                    include("./Lab02/index.html");
                    break;
                case "Lab02_post": //action
                    include("./Lab02/Lab02_post.php");
                    break;
                case "Lab02_1function":
                    include("./Lab02/Lab02_1function.php");
                    break;
                case "source_Lab02_index":
                    include("./Lab02/source_Lab02_index.html");
                    break;
                case "source_Lab02_post":
                    include("./Lab02/source_Lab02_post.html");
                    break;

                    /*Lab03*/
                case "Lab03":
                    include("./Lab03/index.html");
                    break;
                case "Lab03_circle":
                    include("./Lab03/Lab03_circle.php");
                    break;
                case "Lab03_rectangle":
                    include("./Lab03/Lab03_rectangle.php");
                    break;
                case "source_Lab03_circle":
                    include("./Lab03/source_Lab03_circle.html");
                    break;
                case "source_Lab03_rectangle":
                    include("./Lab03/source_Lab03_rectangle.html");
                    break;
                    /*Lab04*/
                case "Lab04":
                    include("./Lab04/index.html");
                    break;
                case "Lab04_circle":
                    include("./Lab04/Lab04_circle.php");
                    break;
                case "Lab04_circle_OOP": //action
                    include("./Lab04/Lab04_circle_OOP.php");
                    break;


                    /*Lab05*/
                case "Lab05":
                    include("./Lab05/index.html");
                    break;
                case "Lab05_normal": //action
                    include("./Lab05/Lab05_normal.php");
                    break;
                case "Lab05_home_work":
                    include("./Lab05/Lab05_home_work.html");
                    break;
                case "Lab05_fucntion": //action Home work
                    include("./Lab05/Lab05_fucntion.php");
                    break;

                    /*Lab06*/
                case "Lab06":
                    include("./Lab06/Lab06_tax.html");
                    break;
                case "Lab06_cal_tax":
                    include("./Lab06/Lab06_tax.php");
                    break;
                case "Lab06_tax_oop":
                    include("./Lab06/Lab06_oop.php");
                    break;
                    /*Lab07 */
                case "Lab07_normal":
                    include("./Lab07/Lab07_normal.html");
                    break;
                case "sales_normal":
                    include("./Lab07/sales_normal.php");
                    break;
                case "Lab07_func":
                    include("./Lab07/Lab07_func.html");
                    break;
                case "sales_func":
                    include("./Lab07/sales_func.php");
                    break;
                case "Lab07_oop":
                    include("./Lab07/Lab07_oop.html");
                    break;
                case "sales_oop":
                    include("./Lab07/sales_oop.php");
                    break;

                    /*Lab08 */
                case "Lab08":
                    include("./Lab08/index.php");
                    break;

                    // Lab_shape
                case "shape":
                    include("./Lab_shape/index.php");
                    break;
                case "shape_class":
                    include("./Lab_shape/shape_class.php");
                    break;
                case "index_grade":
                    include("./Lab_shape/index_grade.php");
                    break;
                case "grade":
                    include("./Lab_shape/PercentageGrade.php");
                    break;

                    /*Lab_vat */
                case "Lab_vat":
                    include("./Lab_vat/index.php");
                    break;

                    /*Lab_Factorial */
                case "Lab_formfac":
                    include("./Lab_Factorial/index.php");
                    break;
                case "Lab_fac":
                    include("./Lab_Factorial/labFactorial.php");
                    break;
                case "Lab_fac1":
                    include("./Lab_Factorial/lab_oop_factorial.php");
                    break;


                default:
                    include("homepage.html");
                    break;
            } // end switch
        } else {
            include("homepage.html"); // คำอธิบายรายวิชา
        }
        ?>
    </div>
    <!-- ส่วนเครดิต footer -->
    <?php require_once("footer.html") ?>
    <!-- Script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- code Prism.Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
</body>

</html>