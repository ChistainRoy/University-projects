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

    .status {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .text-primary {
        color: #696cff;
    }
</style>
<?php
include('connect.php');
?>
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
$status_wait = 0;
$status_chackwait = 0;
$pass = 0;
$sqli = "SELECT * FROM `order` WHERE cm_id = $numberuser";
$resulti = mysqli_query($conn, $sqli);
while ($fetch = mysqli_fetch_assoc($resulti)) {
    if ($fetch['oder_status'] == 'รอชำระเงิน') {
        $status_wait++;
    } else if ($fetch['oder_status'] == 'รอการตรวจสอบ') {
        $status_chackwait++;
    } else if ($fetch['oder_status'] == 'อนุมัติ') {
        $pass++;
    }
}

$status_all = 0;
$sqlstatus = "SELECT COUNT(DISTINCT `order`.`order_id`) AS unique_order_count
FROM `order`
INNER JOIN `performance` ON `order`.`order_id` = `performance`.`order_id`
WHERE `order`.`cm_id` = $numberuser;
";
// ตรวจสอบการคิวรีและนำผลลัพธ์ไปเก็บในตัวแปร
if ($resultstatus) {
    // ใช้ fetch_assoc เพื่อรับข้อมูลแถวเดียว
    if ($fetch = mysqli_fetch_assoc($resultstatus)) {
        // นำค่าจากคอลัมน์ unique_order_count ไปเก็บในตัวแปร
        $status_all = $fetch['unique_order_count'];

        // แสดงผลลัพธ์
        echo "Total unique orders: " . $status_all;
    } else {
        // ไม่พบข้อมูล
        echo "No data found.";
    }

    // คืนทรัพยากรคิวรี
    mysqli_free_result($resultstatus);
} else {
    // การคิวรีผิดพลาด
    echo "Query error: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);




?>

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
                        <a class="nav-link" aria-current="page" href="#">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">เกี่ยวกับร้าน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <form class="d-flex justify-content-between" onsubmit="return false">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary me-2" type="submit">Search</button>
                </form>
                <div class="btn-group dropstart">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username_user'] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0);">แก้ไขข้อมูลส่วนตัว</a></li>
                        <li><a class="dropdown-item" href="myorder.php">ออเดอร์ของฉัน&nbsp;&nbsp;<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $numorder ?></span></a>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <section>
        <div class="container mt-5">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                            <i class='bx bx-coin-stack'></i> รอชำระเงิน
                            <?php if ($status_wait != 0) : ?>
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $status_wait ?></span>
                            <?php endif; ?>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
                            <i class='bx bx-loader-circle'></i> รอตวจสอบการชำระเงิน
                            <?php if ($status_chackwait != 0) : ?>
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $status_chackwait ?></span>
                            <?php endif; ?>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">
                            <i class="tf-icons bx bx-message-square"></i> รอตรวจสอบสถานที่ติดตั้ง
                            <?php if ($pass != 0) : ?>
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $pass ?></span>
                            <?php endif; ?>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-result" aria-controls="navs-justified-result" aria-selected="false">
                            <i class='bx bx-badge-check'></i> ผลการดำเนินงาน
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-status" aria-controls="navs-justified-status" aria-selected="false">
                            <i class='bx bx-badge-check'></i> ดำเนินการเสร็จสิ้น
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                        <div class="row">
                            <?php
                            $wait = "SELECT * FROM `order` WHERE cm_id = $numberuser AND oder_status = 'รอชำระเงิน'";
                            $querywait = mysqli_query($conn, $wait);
                            if (mysqli_num_rows($querywait) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($querywait)) {
                            ?>
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-title p-4">
                                                <p>รหัสคำสั่งซื้อ</p>
                                                <h2>#<?php echo $row['order_id'] ?></h2>
                                                <p>วันสั่งซื้อ</p>
                                                <h4><?php
                                                    $thaiMonths = array(
                                                        1 => 'มกราคม',
                                                        2 => 'กุมภาพันธ์',
                                                        3 => 'มีนาคม',
                                                        4 => 'เมษายน',
                                                        5 => 'พฤษภาคม',
                                                        6 => 'มิถุนายน',
                                                        7 => 'กรกฎาคม',
                                                        8 => 'สิงหาคม',
                                                        9 => 'กันยายน',
                                                        10 => 'ตุลาคม',
                                                        11 => 'พฤศจิกายน',
                                                        12 => 'ธันวาคม'
                                                    );
                                                    $date = $row['order_date'];
                                                    $timestamp = strtotime($date);
                                                    $buddhistYear = date("Y", $timestamp) + 543;
                                                    $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                                                    $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?></h4>
                                                <p>วันตรวจสอบสถานที่ติดตั้ง</p>
                                                <h4><?php
                                                    $date = $row['order_reserve'];
                                                    $timestamp = strtotime($date);
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?>
                                                </h4>
                                                <p>ราคา</p>
                                                <h4><?php
                                                    echo $row['oder_total'] ?>&nbsp;฿</h4>
                                                <hr>
                                                <?php echo "<a class='btn btn-primary' href='detail.php?ids=" . $row['order_id'] . "'>ดูรายละเอียด / ชำระเงิน</a>"; ?>
                                                <?php echo "<a class='btn btn-danger' href='detail.php?idd=" . $row['order_id'] . "'>ยกเลิกคำสั่งซื้อ</a>"; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                        <div class="row">
                            <?php
                            $wait = "SELECT * FROM `order` WHERE cm_id = $numberuser AND oder_status = 'รอการตรวจสอบ'";
                            $querywait = mysqli_query($conn, $wait);
                            if (mysqli_num_rows($querywait) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($querywait)) {
                            ?>
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-title p-4">
                                                <p>รหัสคำสั่งซื้อ</p>
                                                <h2>#<?php echo $row['order_id'] ?></h2>
                                                <p>วันสั่งซื้อ</p>
                                                <h4><?php
                                                    $thaiMonths = array(
                                                        1 => 'มกราคม',
                                                        2 => 'กุมภาพันธ์',
                                                        3 => 'มีนาคม',
                                                        4 => 'เมษายน',
                                                        5 => 'พฤษภาคม',
                                                        6 => 'มิถุนายน',
                                                        7 => 'กรกฎาคม',
                                                        8 => 'สิงหาคม',
                                                        9 => 'กันยายน',
                                                        10 => 'ตุลาคม',
                                                        11 => 'พฤศจิกายน',
                                                        12 => 'ธันวาคม'
                                                    );
                                                    $date = $row['order_date'];
                                                    $timestamp = strtotime($date);
                                                    $buddhistYear = date("Y", $timestamp) + 543;
                                                    $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                                                    $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?></h4>
                                                <p>วันตรวจสอบสถานที่ติดตั้ง</p>
                                                <h4><?php
                                                    $date = $row['order_reserve'];
                                                    $timestamp = strtotime($date);
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?>
                                                </h4>
                                                <p>ราคา</p>
                                                <h4><?php
                                                    echo $row['oder_total'] ?>&nbsp;฿</h4>
                                                <hr>
                                                <br>

                                                <h4 class="text-center"><?php
                                                                        echo $row['oder_status'] ?>&nbsp;
                                                </h4>

                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                        <div class="row">
                            <?php
                            $wait = "SELECT * FROM `order` WHERE cm_id = $numberuser AND oder_status = 'อนุมัติ'";
                            $querywait = mysqli_query($conn, $wait);
                            if (mysqli_num_rows($querywait) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($querywait)) {
                            ?>
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-title p-4">
                                                <p>รหัสคำสั่งซื้อ</p>
                                                <h2>#<?php echo $row['order_id'] ?></h2>
                                                <p>วันสั่งซื้อ</p>
                                                <h4><?php
                                                    $thaiMonths = array(
                                                        1 => 'มกราคม',
                                                        2 => 'กุมภาพันธ์',
                                                        3 => 'มีนาคม',
                                                        4 => 'เมษายน',
                                                        5 => 'พฤษภาคม',
                                                        6 => 'มิถุนายน',
                                                        7 => 'กรกฎาคม',
                                                        8 => 'สิงหาคม',
                                                        9 => 'กันยายน',
                                                        10 => 'ตุลาคม',
                                                        11 => 'พฤศจิกายน',
                                                        12 => 'ธันวาคม'
                                                    );
                                                    $date = $row['order_date'];
                                                    $timestamp = strtotime($date);
                                                    $buddhistYear = date("Y", $timestamp) + 543;
                                                    $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                                                    $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?></h4>
                                                <p>วันตรวจสอบสถานที่ติดตั้ง</p>
                                                <h4><?php
                                                    $date = $row['order_reserve'];
                                                    $timestamp = strtotime($date);
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?>
                                                </h4>
                                                <p>ราคา</p>
                                                <h4><?php
                                                    echo $row['oder_total'] ?>&nbsp;฿</h4>
                                                <hr>
                                                <br>
                                                <div class="status">
                                                    <h3 class="text-primary">
                                                        <?php
                                                        echo $row['oder_status'] ?>
                                                    </h3>
                                                    <br>
                                                </div>
                                                <h3 class="text-center">(รอตรวจสอบสถานที่ติดตั้ง)
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-result" role="tabpanel">
                        <p>
                            Cake cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon
                            gummies
                            cupcake gummi bears cake chocolate.
                        </p>
                        <p class="mb-0">
                            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake.
                            Sweet
                            roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding
                            jelly
                            jelly-o tart brownie jelly.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-status" role="tabpanel">
                        <p>
                            Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon
                            gummies
                            cupcake gummi bears cake chocolate.
                        </p>
                        <p class="mb-0">
                            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake.
                            Sweet
                            roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding
                            jelly
                            jelly-o tart brownie jelly.
                        </p>
                    </div>
                </div>
            </div>

    </section>
    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
            </div>
            <div>
                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
            </div>
        </div>
    </footer>
    <!-- / Footer -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Get the URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const msg = urlParams.get('msg');

        // Check the status and display the SweetAlert message
        if (status === 'success') {
            Swal.fire({
                title: 'Success',
                text: msg,
                icon: 'success',
                confirmButtonClass: 'btn btn-primary'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to order.php with success status and message
                    const redirectURL = 'myorder.php';
                    window.location.href = redirectURL;
                }
            });
        } else if (status === 'error') {
            Swal.fire({
                title: 'Error',
                text: msg,
                icon: 'error',
                confirmButtonClass: 'btn btn-primary'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to order.php with success status and message
                    const redirectURL = 'myorder.php';
                    window.location.href = redirectURL;
                }
            });
        }
    </script>
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