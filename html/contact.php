<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Home - Page | Buddy-Aluminum</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
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
    .navbar {
        background-color: #ffffff;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    a.navbar-brand {
        color: white;
    }

    .num {
        font-family: 'Sigmar', cursive;
        background-color: red;
        position: absolute;
        color: white;
        font-size: 14px;
        margin-left: 150px;
        margin-bottom: 50px;
        margin-top: -37px;
        width: 30px;
        text-align: center;
        padding: 4px;
        border-radius: 20px;
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

    .dropdown .dropdown-menU {
        display: none;
    }

    .dropdown:hover>.dropdown-menu,
    .dropend:hover>.dropdown-menu {
        display: block;
        margin-top: .125em;
        margin-left: .125em;
    }

    @media screen and (min-width:769px) {
        .dropend:hover>.dropdown-menu {
            position: absolute;
            top: 0;
            left: 100%;
        }
    }

    .about {
        font-size: 80px;
    }

    .icon-large {
        font-size: 48px;
        color: white;
    }

    .icon-lar {
        font-size: 28px;
    }

    .detail {
        font-size: 20px;
    }

    .bg2 {
        background-color: #696cff;
    }

    .detail2 {
        color: white;
    }

    .star.active {
        color: gold;
    }
</style>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username_user'])) {
        header("location: login.php");
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username_user']);
        header("location: login.php");
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
                        <a class="nav-link active" href="javascript:void(0)">เกี่ยวกับร้าน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <form class="d-flex" onsubmit="return false">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username_user'] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
                        <li><a class="dropdown-item" href="myorder.php">ออเดอร์ของฉัน&nbsp;&nbsp;<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">1</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section>
        <?php include('connect.php');
        $sql = "SELECT * FROM `shop`";
        $success = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($success);
        ?>
        <div class="container-fluid p-0 mt-5">
            <div class="row">
                <div class="col-xl-8 map-container d-flex justify-content-center align-items-center">
                    <?php echo $row['google'] ?>
                </div>
                <div class="col-xl-3">
                    <div class="card p-3">
                        <h5 class="text-center">ช่องทางติดต่อทางร้าน</h5>
                        <p>
                            เจ้าของร้าน : <?php echo $row['boss_name'] ?>
                        </p>
                        <p>
                            ที่อยู่ : <?php echo $row['address'] ?>
                        </p>
                        <p>
                            โทร : <?php
                                    $phoneNumber = $row['phone'];
                                    if (strlen($phoneNumber) == 10) {
                                        // Format the phone number
                                        $formattedPhoneNumber = substr($phoneNumber, 0, 3) . '-' . substr($phoneNumber, 2, 4) . '-' . substr($phoneNumber, 6, 4);

                                        // Output the formatted phone number
                                        echo $formattedPhoneNumber;
                                    } else {
                                        echo "Invalid phone number length";
                                    }
                                    ?>
                        </p>
                        <p>
                            อีเมล : <?php echo $row['email'] ?>
                        </p>
                        <p>
                            เพจ facebook : <a href="<?php echo $row['facebook'] ?>" target="_blank">บัดดี้อลูมิเนียม-กระจก</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- สิ้นสุด Contact Section -->



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