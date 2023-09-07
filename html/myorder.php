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

    .modal-backdrop {
        z-index: -1;
    }

    .timeline-with-icons {
        border-left: 1px solid hsl(0, 0%, 90%);
        position: relative;
        list-style: none;
    }

    .timeline-with-icons .timeline-item {
        position: relative;
    }

    .timeline-with-icons .timeline-item:after {
        position: absolute;
        display: block;
        top: 0;
    }

    .timeline-with-icons .timeline-icon {
        position: absolute;
        left: -48px;
        background-color: #696cff;
        color: white;
        border-radius: 50%;
        height: 31px;
        width: 31px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .text-box {
        max-width: 700px;
        white-space: initial;
    }

    .card-status {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bx-brightness-half {
        font: 4em sans-serif;
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
$orderWait = array();
$orderChackWait = array();
$sqli = "SELECT * FROM `order` WHERE cm_id = $numberuser";
$resulti = mysqli_query($conn, $sqli);
while ($fetch = mysqli_fetch_assoc($resulti)) {
    if ($fetch['oder_status'] == 'รอชำระเงิน') {
        $status_wait++;
        $orderWait[] = $fetch;
    } else if ($fetch['oder_status'] == 'รอการตรวจสอบ') {
        $status_chackwait++;
        $orderChackWait[] = $fetch;
    }
}


$status_all = 0;
$success = 0;
$orderpass = array();
$sqlstatus = "SELECT `order`.order_id, `order`.`cm_id`, performance.`date_ operate`, performance.status_performance,comment.comment_detail 
FROM `order` 
INNER JOIN performance ON `order`.`order_id` = performance.order_id 
LEFT JOIN comment ON performance.order_id = comment.order_id WHERE `order`.`cm_id` = $numberuser 
AND performance.`date_ operate` = ( SELECT MAX(`date_ operate`) 
FROM performance 
WHERE performance.order_id = `order`.order_id );
";
$resultstatus = mysqli_query($conn, $sqlstatus);
// ตรวจสอบการคิวรีและนำผลลัพธ์ไปเก็บในตัวแปร
if ($resultstatus) {
    // ใช้ fetch_assoc เพื่อรับข้อมูลแถวเดียว
    while ($fetch = mysqli_fetch_assoc($resultstatus)) {
        if ($fetch['status_performance'] == 'ดำเนินการแก้ไข' or $fetch['status_performance'] == 'รอดำเนินการติดตั้งสินค้า') {
            $status_all++;
        } else if ($fetch['status_performance'] == 'ดำเนินการเสร็จสิ้น') {
            $success++;
            $orderpass[] = $fetch;
        }
    }
}

$number = 0;
$wait = "SELECT `order`.`order_id`,`order`.`order_reserve`,`order`.`oder_total`,`order`.`oder_status`, `order`.`cm_id`, `order`.`order_date`, performance.*
FROM `order`
INNER JOIN performance ON `order`.`order_id` = performance.order_id
WHERE `order`.`cm_id` = $numberuser
GROUP BY `order`.`order_id`
HAVING COUNT(*) = 1;
";
$querywait = mysqli_query($conn, $wait);

// สร้างอาร์เรย์เปล่าเพื่อเก็บข้อมูล
$dataArray = array();

while ($row = mysqli_fetch_assoc($querywait)) {
    $dataArray[] = $row;
    $number++;
}
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
                        <a class="nav-link" aria-current="page" href="index_user.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">เกี่ยวกับร้าน</a>
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
                <div class="btn-group dropstart">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username_user'] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
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
                            <?php if ($number != 0) : ?>
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $number ?></span>
                            <?php endif; ?>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-result" aria-controls="navs-justified-result" aria-selected="false">
                            <i class='bx bx-badge-check'></i> ผลการดำเนินงาน
                            <?php if ($status_all != 0) : ?>
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $status_all ?></span>
                            <?php endif; ?>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-status" aria-controls="navs-justified-status" aria-selected="false">
                            <i class='bx bx-badge-check'></i> ดำเนินการเสร็จสิ้น
                            <?php if ($success != 0) : ?>
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $success ?></span>
                            <?php endif; ?>
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                        <div class="row">
                            <?php
                            if (!empty($orderWait)) {
                                // output data of each row
                                foreach ($orderWait as $row) {
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
                                                <?php echo "<a class='btn btn-danger' href='cancleorder.php?idd=" . $row['order_id'] . "' onclick=\"return confirm('ต้องการลบคำสั่งซื้อแน่หรือไม่? ข้อมูลนี้ไม่สามารถกู้คืนได้.')\">ยกเลิกคำสั่งซื้อ</a>"; ?>
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
                            if (!empty($orderChackWait)) {
                                // output data of each row
                                foreach ($orderChackWait as $row) {
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
                            if (!empty($dataArray)) {
                                foreach ($dataArray as $data) {
                            ?>
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-title p-4">
                                                <p>รหัสคำสั่งซื้อ</p>
                                                <h2>#<?php echo $data['order_id'] ?></h2>
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
                                                    $date = $data['order_date'];
                                                    $timestamp = strtotime($date);
                                                    $buddhistYear = date("Y", $timestamp) + 543;
                                                    $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                                                    $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?></h4>
                                                <p>วันตรวจสอบสถานที่ติดตั้ง</p>
                                                <h4><?php
                                                    $date = $data['order_reserve'];
                                                    $timestamp = strtotime($date);
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?>
                                                </h4>
                                                <p>ราคา</p>
                                                <h4><?php
                                                    echo $data['oder_total'] ?>&nbsp;฿</h4>
                                                <hr>
                                                <?php echo "<a class='btn btn-primary' href='generatePDF.php?ids=" . $data['order_id'] . "'>พิมพ์ใบเสร็จชำระเงิน</a>"; ?>
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
                        <div class="row">
                            <?php
                            $wait = "SELECT `order`.`order_id`, `order`.`cm_id`, performance.`date_ operate`, performance.`status_performance`
                            FROM `order`
                            INNER JOIN performance ON `order`.`order_id` = performance.order_id
                            WHERE `order`.`cm_id` = $numberuser
                            AND performance.`date_ operate` = (
                                SELECT MAX(`date_ operate`)
                                FROM performance
                                WHERE performance.order_id = `order`.`order_id`
                            )
                            AND `order`.`order_id` IN (
                                SELECT order_id
                                FROM performance
                                GROUP BY order_id
                                HAVING COUNT(*) > 1
                            );
                            ";
                            $querywait = mysqli_query($conn, $wait);
                            $count_card = 0;
                            if (mysqli_num_rows($querywait) > 0) {
                                // output data of each row
                                while ($fetch = mysqli_fetch_assoc($querywait)) {
                                    if ($fetch['status_performance'] == 'ดำเนินการเสร็จสิ้น') {
                                    } else {
                                        $count_card++ ?>
                                        <div class="col-xl-4">
                                            <div class="card">
                                                <div class="card-title p-4">
                                                    <p>รหัสคำสั่งซื้อ</p>
                                                    <h2>#<?php echo $fetch['order_id'] ?></h2>
                                                    <p>วันดำเนินครั้งต่อไป</p>
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
                                                        $date = $fetch['date_ operate'];
                                                        $timestamp = strtotime($date);
                                                        $buddhistYear = date("Y", $timestamp) + 543;
                                                        $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                                                        $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                                                        $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                        echo $thaiFormattedDate;
                                                        ?></h4>
                                                    <p>สถานะปัจจุบัน</p>
                                                    <h4><?php
                                                        echo $fetch['status_performance'];
                                                        ?>
                                                    </h4>
                                                    <hr>
                                                    <?php echo "<a class='btn btn-primary' href='detail_perform.php?ids=" . $fetch['order_id'] . "'>ดูรายละเอียดงาน</a>"; ?>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                                    include('modal_perform.php');
                                }
                            } else {
                                echo "0 results";
                            } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-status" role="tabpanel">
                        <div class="row">
                            <?php
                            if (!empty($orderpass)) {
                                // output data of each row
                                foreach ($orderpass as $pass) {
                            ?>
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-title p-4">
                                                <p>รหัสคำสั่งซื้อ</p>
                                                <h2>#<?php echo $pass['order_id'] ?></h2>
                                                <p>วันดำเนินครั้งต่อไป</p>
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
                                                    $date = $pass['date_ operate'];
                                                    $timestamp = strtotime($date);
                                                    $buddhistYear = date("Y", $timestamp) + 543;
                                                    $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                                                    $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                                                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                    echo $thaiFormattedDate;
                                                    ?></h4>
                                                <p>สถานะปัจจุบัน</p>
                                                <h4><?php
                                                    echo $pass['status_performance'];
                                                    ?>
                                                </h4>
                                                <hr>
                                                <?php if ($pass['comment_detail'] == "") {
                                                    echo '<button class="btn btn-secondary" disabled>แสดงความคิดเห็นแล้ว</button>';
                                                } else {
                                                    echo "<a class='btn btn-primary' href='comment.php?ids=" . $pass['order_id'] . "'>แสดงความคิดเห็น</a>";
                                                } ?>
                                                <br>
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
    <?php if (isset($_SESSION['errors'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: '<?php echo $_SESSION['errors']; ?>',
            });
        </script>
    <?php unset($_SESSION['errors']);
    endif; ?>
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