<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

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

    h1 {
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

    h4 {
        font-family: 'Sarabun', sans-serif;
        color: black;
    }

    .navbar {
        background-color: #ffffff;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    a.navbar-brand {
        color: white;
    }

    .card {
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);

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
        color: red;
        font-size: 16px;
    }

    .numbercart {
        font-family: 'Sigmar', cursive;
        font-size: 32px;
        color: #696cff;
    }

    .productimg {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 5px;
        width: 150px;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
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

    .product {
        margin-left: 10px;
    }

    .detail {
        font-family: 'Sigmar', cursive;
        font-weight: 100%;
        color: #696cff;
    }

    .but {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .nameproduct {
        color: black;
        font-family: 'Sarabun', sans-serif;
    }

    .inputnumber {
        border: none;
    }

    @media (max-width:720px) {
        img.md {
            display: flex;
            max-width: 100%;
            justify-content: center;
            align-items: center;
            margin-left: 19%;
        }



        .md {
            text-align: center;
            max-width: 100%;

        }
    }

    @media (max-width:576px) {
        img.md {
            display: flex;
            max-width: 100%;
            justify-content: center;
            align-items: center;
            margin-left: 19%;
        }



        .md {
            text-align: center;
            max-width: 100%;

        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <img src="upload/b.png" width="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="javascript:void(0)">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">เกี่ยวกับร้าน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            สินค้า
                        </a>
                        <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="del_session.php">สินค้าทั้งหมด</a></li>
                            <li><a class="dropdown-item" href="cart2.php">หน้าต่าง</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0)">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex justify-content-between" onsubmit="return false">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary me-2" type="submit">Search</button>
                </form>
                <a href="cartproduct.php" class="max">
                    <i class="bi bi-cart-plus fs-3">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id='cart_count' class='num'>$count</span>";
                        } else {
                            $count = 0;
                            echo "<span id='cart_count' class='num'>0</span>";
                        } ?>
                    </i>
                </a>
            </div>
        </div>
    </nav>
    <section>
        <div class="container p-5">

            <div class="card">
                <br>
                <div class="row px-5">
                    <h3>ตระกร้าสินค้า <span class="numbercart">(<?php echo $count ?>)</span></h3>
                    <hr>
                    <?php
                    // print_r($_SESSION['cart']);
                    include('connect.php');
                    $query = "SELECT * FROM `product`";
                    $result = mysqli_query($conn, $query);
                    $inputId = 1;
                    // print_r($_SESSION['cart']);
                    foreach ($_SESSION['cart'] as $item_array) {
                        // echo $item_array['productid'] . '<br>';

                        // $valueToCompare++;
                        // print_r($item_array);
                        if ($result) {
                            // Compare the ID with the database values
                            $yourComparisonID = $item_array['productid']; // ID to compare
                            $sql = "SELECT * FROM product WHERE product_id = '$yourComparisonID'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {


                                $yourComparisonID = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $width = $row['product_width'];
                                $length = $row['product_length']; {
                    ?><from action="cart_delet.php" method="get" class="cart-items">
                                        <br>
                                        <div class="row ">
                                            <div class="col-xl-2 col-lg-2 mt-3 mx-5">
                                                <img class="productimg mb-5 md" src="<?php echo $row['product_img']; ?>">
                                            </div>
                                            <div class="product col-xl-2 col-lg-8 mt-3">
                                                <input type="text" value="<?php echo $yourComparisonID ?>" class="from-control w-25 d-inline text-center mx-2 input-group-text" name="productid">

                                                <h4 class="nameproduct md"><?php echo $name ?></h4>
                                                <h5 class="detail md">ขนาด: <?php echo $width ?> X <?php echo $length ?> ซม.</h5>
                                                <h5 class="detail md">สีกรอบ:<?php if ($row['colorglass'] === "1") {
                                                                                    $color = "เขียว";
                                                                                    echo $color;
                                                                                } else if ($row['colorglass'] === "2") {
                                                                                    echo $color = "ดำ";
                                                                                } else if ($row['colorglass'] === "3")
                                                                                    echo $color = "กันยูวี";
                                                                                ?></h5>
                                                <h5 class="detail md">สีกระจก:<?php if ($row['colorframe'] === "1") {
                                                                                    $frame = "ชา";
                                                                                    echo $color;
                                                                                } else if ($row['colorframe'] === "2") {
                                                                                    echo $frame = "นม";
                                                                                } else if ($row['colorframe'] === "3") {
                                                                                    echo $frame = "ดำ";
                                                                                } else if ($row['colorframe'] === "4") {
                                                                                    echo $frame = "ไม้";
                                                                                }

                                                                                ?></h5>

                                            </div>
                                            <div class="col-xl-1 col-lg-2 mt-3 md">
                                                <h4>ราคา</h4>
                                                <h5 class="detail" id="result"><?php echo $price ?> ฿</h5>
                                            </div>
                                            <div class="col-xl-2 col-lg-6 mt-3 ">
                                                <h4 class="">จำนวน</h4>

                                                <button type="button" class="btn rounded-pill btn-icon btn-primary" onclick="increment('<?php echo $inputId; ?>')">
                                                    <span class="bx bxs-plus-circle fs-3"></span>
                                                </button>
                                                <input type="number" value="1" class="inputnumber w-25 text-center mx-2" id="<?php echo $inputId; ?>" oninput="calculateResult()">
                                                <button type="button" class="btn rounded-pill btn-icon btn-primary" onclick="decrement('<?php echo $inputId; ?>')">
                                                    <span class="bx bx-minus-circle fs-3"></span>
                                                </button>

                                            </div>
                                            <div class="col-xl-2 col-lg-4 mt-3">
                                                <h4 class="text-center">ลบ</h4>
                                                <div class="but">
                                                    <?php echo "<a href='cart_delet.php?did=" . $yourComparisonID . "' onclick=\"return confirm('ต้องการลบสินค้าชิ้นนี้หรือไม่?.');\"class='btn rounded-pill btn-icon btn-danger'>
                                                <span class='tf-icons bx bx-x'></span>
                                                </a>"; ?>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                    </from>
                                    <hr>
                                    <input type="number" id="numberInput" oninput="calculateResult()" />
                                    <span id="result"></span>
                                    <span id="multiplier" data-value="<?php echo $price ?>"></span>
                    <?php
                                }
                                $inputId++;
                            }
                        } else {
                            echo "Query failed: " . mysqli_error($conn);
                        }
                    }

                    ?>
                    <div class="col-6 row">
                        <h3 class="numbercart">รายละเอียดคำสั่งซื้อ</h3>
                        <br>
                        <div class="col-6">
                            <h4>ราคารวม</h4>
                        </div>
                        <div class="col-6">
                            <h5 class="detail text-center"><?php echo $price ?> ฿</h5>
                        </div>
                        <div class="col-6">
                            <h4>จำนวนสินค้า</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php
    if (isset($_POST['remove'])) {
        print_r($_GET['id']);
    }
    ?>




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

    <script>
        // JavaScript
        function increment(inputId) {
            var input = document.getElementById(inputId);
            input.value = parseInt(input.value) + 1;
        }

        function decrement(inputId) {
            var input = document.getElementById(inputId);
            input.value = parseInt(input.value) - 1;
        }
    </script>
    <script>
        function calculateResult() {
            var number = parseInt(document.getElementById("numberInput").value);
            var multiplier = parseInt(document.getElementById("multiplier").getAttribute("data-value"));
            var result = number * multiplier;
            document.getElementById("result").textContent = result;
        }
    </script>
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