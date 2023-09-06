<?php
session_start();
if (!isset($_SESSION['username_user'])) {
    header("location: login.html");
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['login.html']);
    header("location: auth-login-basic.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Buddy - Aluminum | สินค้าทั้งหมด</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme_user.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Pathway+Extreme:ital,opsz,wght@1,8..144,200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap');

    .footer-text {
        font-family: 'Sarabun', sans-serif;
        font-size: 24px;
    }

    a {
        font-family: 'Sarabun', sans-serif;
    }

    h3 {
        font-family: 'Sarabun', sans-serif;
    }

    h2 {
        font-family: 'Sigmar', cursive;
        font-size: 32px;
        color: #696cff;
    }

    .navbar {
        background-color: #ffffff;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    a.navbar-brand {
        color: white;
    }

    .card {
        border-radius: 4px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        cursor: pointer;

    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    .carousel-item {
        width: 100%;
        height: 700px;
    }

    .slide {
        width: 100%;
        height: 700px;
    }

    .card-img-top {
        width: 100%;
        height: 400px;
        padding: 10px;
    }

    @media (max-width:767px) {
        .slide {
            max-width: 100%;
            height: 200px;
        }
    }

    @media (max-width:767px) {
        .carousel-item {
            max-width: 100%;
            height: 200px;
        }
    }

    #navbarSupportedContent {
        text-align: center;
    }

    .bi-cart-plus {
        font-size: 20px;
        padding: 5px;
        display: flex;
        align-items: center;
    }

    .num {
        font-family: 'Sigmar', cursive;
        background-color: red;
        position: absolute;
        color: white;
        font-size: 14px;
        margin-left: 16px;
        margin-bottom: 20px;
        width: 30px;
        text-align: center;
        padding: 4px;
        border-radius: 20px;
    }

    @media (min-width:992px) {
        .buy-now {
            display: none;
        }

    }

    @media (max-width:991px) {
        .max {
            display: none;
        }
    }

    .nav-link a {
        font-size: 24px;
    }

    @media only screen and (min-width: 375px) and (max-width: 767px) {
        a {
            font-size: 18px;
        }

        .navbar-light .navbar-nav .nav-link:hover:after,
        .navbar-light .navbar-nav .nav-link:focus:after {
            color: #696cff;
            transform: scaleX(0);
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        a {
            font-size: 24px;
        }

        .navbar-light .navbar-nav .nav-link:hover:after,
        .navbar-light .navbar-nav .nav-link:focus:after {
            color: #696cff;
            transform: scaleX(0);
        }
    }

    .navbar-fillter {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    select {
        border-radius: 6px;
        border-color: none;
        background-color: #F3F3F3;
    }

    label {
        font-size: 16px;
        padding-left: 10px;
        color: while;
    }

    option {
        background-color: #F3F3F3;
    }

    option:hover {
        background-color: back;
    }

    .submit {

        border-radius: 6px;
        border-color: none;
        background-color: #F3F3F3;
        font-size: 16px;
    }
</style>


<body>
    <?php
    if (isset($_POST['add'])) {
        print_r($_POST['productid']);
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'],  "productid");

            if (in_array($_POST['productid'], $item_array_id)) {
                echo "<script>alert('Product is already add in the cart')</script>";
                echo "<script>window.location = 'allproduct.php'</script>";
            } else {

                $count = count($_SESSION['cart']);
                $item_array = array(
                    'productid' => $_POST['productid']
                );
                $_SESSION['cart'][$count] = $item_array;
                print_r($_SESSION['cart']);
            }
        } else {
            $item_array = array(
                'productid' => $_POST['productid']
            );
            //create new session variable
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
        }
    }
    ?>
    <?php
    if (!isset($_SESSION['username_user'])) {
        header("location: login.php");
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username_user']);
        header("location: login.php");
    }

    include('connect.php');
    $user = $_SESSION['username_user'];
    $sql = "SELECT cm_id,name FROM cumtomer WHERE username = '$user'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($query)) {
            $numberuser = $row['cm_id'];
            $_SESSION['fullname'] = $row['name'];
        }
    } else {
        //   echo "0 results";
    }
    $sql = "SELECT COUNT(cm_id) AS test FROM `order` WHERE cm_id = $numberuser";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        //   echo $row['test'];
        $numorder = $row['test'];
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">

            <img src="upload/b.png" width="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index_user.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">เกี่ยวกับร้าน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            สินค้า
                        </a>
                        <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="cart2.php">หน้าต่างบานเลื่อน</a></li>
                            <li><a class="dropdown-item" href="cart3.php">หน้าต่างบานพับ</a></li>
                            <li><a class="dropdown-item" href="cart4.php">หน้าต่างห้องน้ำ</a></li>
                            <li><a class="dropdown-item" href="cart5.php">ประตูบานเลื่อน</a></li>
                            <li><a class="dropdown-item" href="cart6.php">ประตูบานพับ</a></li>
                            <li>
                                <hr class="dropdown-divider" />

                            </li>
                            <li><a class="dropdown-item" href="allproduct.php">สินค้าทั้งหมด</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex justify-content-between" method="post" action="">
                    <input class="form-control me-2" type="text" placeholder="ชื่อสินค้า,กว้าง,ยาว,ราคา" aria-label="Search" name="search_query" />
                    <button class="btn btn-outline-primary me-2 search" type="submit">ค้นหา</button>
                </form>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username_user'] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
                        <li><a class="dropdown-item" href="myorder.php">ออเดอร์ของฉัน&nbsp;&nbsp;<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $numorder ?></span></a>
                            <?php
                            echo "<span id='cart_count'></span>";
                            ?></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
                <a href="cartproduct.php" class="max">
                    <i class="bi bi-cart-plus fs-3">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id='cart_count' class='num'>$count</span>";
                        } else {
                            echo "<span id='cart_count' class='num'>0</span>";
                        } ?>
                    </i>
                </a>

            </div>
        </div>
        </div>
    </nav>

    <!-- ภาพสไลด์ -->
    <section>
        <div class="container-fluid p-0 mb-0">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <ol class="img carousel-indicators">
                    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="slide" src="upload/ex.jpg" alt="First slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="slide" src="upload/ex.jpg" alt="Second slide" />
                    </div>
                    <div class="carousel-item">
                        <img class="slide" src="upload/ex.jpg" alt="Third slide" />
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- /ภาพสไลด์ -->

    <!-- สินค้า -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- <nav class="navbar navbar-light bg-primary mb-3">
                <div class="container-fluid">
                    <form action="Search.php">
                        <label for="type">ประเภทสินค้า:</label>
                        <select name="cars" class="py-1 px-1">
                            <option value="volvo">ประตูบานเลื่อน</option>
                            <option value="saab">ประตูบานพับ</option>
                            <option value="audi">หน้าต่างบานเลื่อน</option>
                            <option value="audi">หน้าต่างบานพับ</option>
                            <option value="fiat">หน้าต่างห้องน้ำ</option>
                        </select>
                        <label for="type">ขนาด:</label>
                        <select name="cars" class="py-1 px-1">
                            <option value="volvo">ประตูบานเลื่อน</option>
                            <option value="saab">ประตูบานพับ</option>
                            <option value="audi">หน้าต่างบานเลื่อน</option>
                            <option value="audi">หน้าต่างบานพับ</option>
                            <option value="fiat">หน้าต่างห้องน้ำ</option>
                        </select>
                        <label for="type">สีกรอบ:</label>
                        <select name="cars" class="py-1 px-1">
                            <option value="volvo">ประตูบานเลื่อน</option>
                            <option value="saab">ประตูบานพับ</option>
                            <option value="audi">หน้าต่างบานเลื่อน</option>
                            <option value="audi">หน้าต่างบานพับ</option>
                            <option value="fiat">หน้าต่างห้องน้ำ</option>
                        </select>
                        <label for="type">สีกระจก:</label>
                        <select name="cars" class="py-1 px-1">
                            <option value="volvo">ประตูบานเลื่อน</option>
                            <option value="saab">ประตูบานพับ</option>
                            <option value="audi">หน้าต่างบานเลื่อน</option>
                            <option value="audi">หน้าต่างบานพับ</option>
                            <option value="fiat">หน้าต่างห้องน้ำ</option>
                        </select>
                        <button class="submit mx-2" type="submit">ค้นหา</button>
                    </form>
                </div>
            </nav> -->
            <h3><a href="allproduct.php">สินค้า</a> / หน้าต่างบานเลื่อน</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-3">
                <?php
                include('connect.php');
                $products = []; // สร้างอาร์เรย์เพื่อเก็บข้อมูลสินค้า

                $query = mysqli_query($conn, "SELECT * FROM `product` WHERE `category_id` = 1");
                while ($row = mysqli_fetch_assoc($query)) {
                    $products[] = $row; // เพิ่มข้อมูลลงในอาร์เรย์
                }

                // ตรวจสอบว่ามีการส่งคำค้นหามาหรือไม่
                if (isset($_POST['search_query'])) {
                    $search_query = $_POST['search_query'];
                    $filtered_products = [];

                    // วนลูปเพื่อค้นหาสินค้าที่ตรงกับคำค้นหา
                    // วนลูปเพื่อค้นหาสินค้าที่ตรงกับคำค้นหา
                    foreach ($products as $product) {
                        // ใช้ stripos เพื่อค้นหาข้อความในคอลัมที่คุณต้องการค้นหา
                        $found = false;

                        // ตรวจสอบคอลัมที่คุณต้องการค้นหาเท่านั้น (เช่น 'product_name', 'product_description' เป็นต้น)
                        $search_columns = array('product_name', 'product_width', 'product_length', 'product_price');

                        foreach ($search_columns as $column) {
                            if (stripos($product[$column], $search_query) !== false) {
                                $found = true;
                                break; // หากพบคำค้นหาในคอลัมหนึ่งคอลัมให้หยุดการตรวจสอบคอลัมอื่น
                            }
                        }

                        if ($found) {
                            $filtered_products[] = $product;
                        }
                    }


                    // ใช้ $filtered_products แทน $products ในการแสดงผล
                    $products = $filtered_products;
                }
                ?>

                <!-- ตัวอย่างแสดงสินค้า -->
                <?php foreach ($products as $product) { ?>
                    <form action="allproduct.php" method="post">
                        <div class="card-group mb-5">
                            <div class="card h-100">
                                <img class="card-img-top" src="<?php echo $product['product_img'] ?>" alt="Card image cap" />
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $product['product_name'] ?>
                                        <?php echo $product['product_width'] ?> X <?php echo $product['product_length'] ?>
                                        ซม.
                                    </h3>
                                    <h2 class="card-text text-center p-0">
                                        <?php echo $product['product_price'] ?> ฿
                                    </h2>
                                    <hr class="dropdown-divider mb-4" />
                                    <input type="hidden" id="number" class="form-control" name="productid" value="<?php echo $product['product_id'] ?>" hidden />
                                    <div class="row d-grid gap-2 col-6 mx-auto mx-2">
                                        <button class="bt btn rounded-pill btn-outline-primary" type="submit" name="add">เพิ่มลงรถเข็น</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>



    <section id="basic-footer">
        <div class="container-fluid p-0">
            <footer class="footer bg-primary">
                <div class="container d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
                    <div>
                        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                        <a href="javascript:void(0)" class="footer-link me-4">Help</a>
                        <a href="javascript:void(0)" class="footer-link me-4">Contact</a>
                        <a href="javascript:void(0)" class="footer-link">Terms &amp; Conditions</a>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <!-- /สินค้า -->

    <!-- ตระกร้าขนาดมือถือ -->
    <div class="buy-now">

        <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn rounded-pill btn-icon btn-danger btn-buy-now"> <i class="bi bi-cart-plus fs-3">
                <?php
                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                    echo "<span id='cart_count' class='num'>$count</span>";
                } else {
                    echo "<span id='cart_count' class='num'>0</span>";
                } ?>
            </i></a>
    </div>
    <!-- /ตระกร้าขนาดมือถือ -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>