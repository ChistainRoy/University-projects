<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username_admin'])) {
    header("location: login.php");
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username_admin']);
    header("location: login.php");
}
?>
<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Product</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Pathway+Extreme:ital,opsz,wght@1,8..144,200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap');
  th{
    font-size: 16px;
  }
  .add{
    margin-left: 2%;
    margin-top: 1%;
  }
  .card {
    margin: 10px;
    padding: 10px;
}
  .addcart{
    border: none;
}
  .card-img-top {
    width: 100%;
    height: 400px;
    padding: 10px;
    }
  .add-product:hover{
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }
    .none{
      display: none;
    }
    .content-wrapper{
      max-width: 2000px;
    }
    .container-xxl{
      max-width: 2000px;
    }
    #table1{
      padding: 10px;
    }
    #table2{
      padding: 10px;
    }
    .dataTables_length {
    margin-left: 3.5%;
    }
    mark.yellow {
    background-color: #FFF700;
    color: #313131;
    border-radius: 20px;
    padding: 10px;
    border: none;

}
    mark.green {
    background-color: #04FF00;
    color: #313131;
    border-radius: 20px;
    padding: 10px;
    border: none;

}
mark.orang {
    background-color: #FFBF1F;
    color: #313131;
    border-radius: 20px;
    padding: 10px;
    border: none;

}
  .dataTables_filter {
    display: none;
}
  .dataTables_info {
    margin-left: 3.5%;
}
.col-divider {
    border-right: 1px solid #696cff;
  }
  .coin{
    font-family: 'Sigmar', cursive;
        font-size: 42px;
    color: #696cff;
  }
  .no{
    margin-top: 20%;
    
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
.text-box{
  max-width: 700px;
  white-space: initial;
}
.card-status{
  display: flex;
  justify-content: center;
  align-items: center;
}
.bx-brightness-half{
  font: 4em sans-serif;
}
    .swal2-styled.swal2-confirm {
      background-color: #27ae60; /* Green background color */
      color: #fff; /* Text color */
    }
    .swal2-styled.swal2-cancel {
      background-color: #c0392b; /* Red background color */
      color: #fff; /* Text color */
    }
</style>
  <body>
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="upload/b.png" width="50">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Buddy</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index_boss.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">หน้าหลัก</div>
              </a>
            </li>
            <!-- จัดการข้อมูล -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">จัดการข้อมูล</span>
            </li>
            <li class="menu-item">
              <a href="em_boss.php" class="menu-link">
              <i class='bx bxs-user-account'></i>
                <div data-i18n="Basic">พนักงาน</div>
              </a>
            </li>



            <!-- จัดการข้อมูล -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">รายงาน</span>
            </li>
            <!-- END จัดการข้อมูล -->



            <!-- จัดการข้อมูล -->
            <li class="menu-item">
              <a href="information_boss.php" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-coin'></i>
                <div data-i18n="Account Settings">รายได้</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="information_boss.php" class="menu-link">
                    <div data-i18n="Account">รายเดือน</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="coin_boss.php" class="menu-link">
                    <div data-i18n="Notifications">ประเภทสินค้า</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- END จัดการข้อมูล -->



            <!-- ลูกค้าใหม่ -->
            <li class="menu-item">
              <a href="cus_boss.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                <div data-i18n="Basic">ลูกค้าใหม่รายเดือน</div>
              </a>
            </li>

            <!-- รายงานสถานะการติดตั้งสินค้าตามวันและเวลา -->
            <li class="menu-item active">
              <a href="status_boss.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Basic">สถานะการติดตั้ง</div>
              </a>
            </li>


            <!-- ความคิดเห็นลูกค้า -->
            <li class="menu-item">
              <a href="comment_boss.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-rounded"></i>
                <div data-i18n="Basic">ความคิดเห็นลูกค้า</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="upload/person.png" alt class="w-px-30 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="upload/person.png" alt class="w-px-30 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"> <?php echo $_SESSION['username_admin'] ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
<?php include('connect.php');
if (isset($_POST['pass'])) {
    $year = $_POST['year'];
    $month = $_POST['month'];
    $query = mysqli_query($conn, " SELECT `order`.`order_id`, `order`.`oder_status`, performance.`date_ operate`, performance.status_performance
  FROM `order`
  INNER JOIN performance ON `order`.`order_id` = performance.order_id
  INNER JOIN (
      SELECT `order_id`, MAX(`date_ operate`) AS max_date
      FROM performance
      GROUP BY `order_id`
  ) AS latest_performance ON performance.order_id = latest_performance.order_id AND performance.`date_ operate` = latest_performance.max_date
  WHERE YEAR(performance.`date_ operate`) = $year
  AND MONTH(performance.`date_ operate`) = $month;
");
    $monthlySalesData = array_fill(0, 4, 0); // Initialize an array to store monthly sales data with 4 zeros
    $sum = 0;
    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $status_performance = $row['status_performance']; // เก็บค่า status_performance ไว้ในตัวแปร

            if ($status_performance == 'รอตรวจสอบสถานที่ติดตั้ง') {
                $monthlySalesData[0]++;
            } else if ($status_performance == 'ดำเนินการแก้ไข') {
                $monthlySalesData[1]++;
            } else if ($status_performance == 'รอติดตั้งสินค้า') {
                $monthlySalesData[2]++;
            } else {
                $monthlySalesData[3]++;
            }
            $sum++;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    $result = mysqli_query($conn, "SELECT `order`.`order_id`, `order`.`oder_status`,`order`.`order_reserve` FROM `order`WHERE YEAR(`order`.`order_reserve`) = $year
AND MONTH(`order`.`order_reserve`) = $month;
");

    $Data = array_fill(0, 3, 0); // Initialize an array to store monthly sales data with 4 zeros
    $total = 0;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row['oder_status']; // เก็บค่า status_performance ไว้ในตัวแปร

            if ($status == 'รอชำระเงิน') {
                $Data[0]++;
            } else if ($status == 'รอตรวจสอบ') {
                $Data[1]++;
            } else if ($status == 'ชำระเงินแล้ว') {
                $Data[2]++;
            }
            $total++;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    $query = mysqli_query($conn, " SELECT `order`.`order_id`, `order`.`oder_status`, performance.`date_ operate`, performance.status_performance
  FROM `order`
  INNER JOIN performance ON `order`.`order_id` = performance.order_id
  INNER JOIN (
      SELECT `order_id`, MAX(`date_ operate`) AS max_date
      FROM performance
      GROUP BY `order_id`
  ) AS latest_performance ON performance.order_id = latest_performance.order_id AND performance.`date_ operate` = latest_performance.max_date;
");
    $monthlySalesData = array_fill(0, 4, 0); // Initialize an array to store monthly sales data with 4 zeros
    $sum = 0;
    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $status_performance = $row['status_performance']; // เก็บค่า status_performance ไว้ในตัวแปร

            if ($status_performance == 'รอตรวจสอบสถานที่ติดตั้ง') {
                $monthlySalesData[0]++;
            } else if ($status_performance == 'ดำเนินการแก้ไข') {
                $monthlySalesData[1]++;
            } else if ($status_performance == 'รอติดตั้งสินค้า') {
                $monthlySalesData[2]++;
            } else {
                $monthlySalesData[3]++;
            }
            $sum++;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    $result = mysqli_query($conn, "SELECT `order`.`order_id`, `order`.`oder_status`,`order`.`order_reserve` FROM `order`;
");

    $Data = array_fill(0, 3, 0); // Initialize an array to store monthly sales data with 4 zeros
    $total = 0;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row['oder_status']; // เก็บค่า status_performance ไว้ในตัวแปร

            if ($status == 'รอชำระเงิน') {
                $Data[0]++;
            } else if ($status == 'รอตรวจสอบ') {
                $Data[1]++;
            } else if ($status == 'ชำระเงินแล้ว') {
                $Data[2]++;
            }
            $total++;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
              <div class="add demo-inline-spacing">
              <div class="row mb-5">
                <div class="col-md-6 col-lg-6 mb-3">
                  <div class="card">
                  <div class="row">
                    <div class="card-body col-xl-6 col-divider">
                      <h5 class="card-title mt-4">จำนวนสถานะทั้งหมดในการชำระเงิน</h5>
                    </div>
                    <div class="card-body col-xl-6">
                      <h2 class="card-title text-center coin"><?php
                                                                $formattedNum = number_format($total);
                                                                echo  $formattedNum ?> (คำสั่งซื้อ)</h2>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                  <div class="card">
                  <div class="row">
                    <div class="card-body col-xl-6 col-divider">
                      <h5 class="card-title mt-4">จำนวนสถานะซื้อทั้งหมดในการดำเนินงาน</h5>
                    </div>
                    <div class="card-body col-xl-6">
                      <h2 class="card-title text-center coin"><?php
                                                                $formattedNum = number_format($sum);
                                                                echo $formattedNum ?> (คำสั่งซื้อ)</h2>
                    </div>
                    </div>
                  </div>
                </div>      
              </div>  
              </div>
              <h5 class="card-header">ตารางข้อมูลคำสั่งซื้อ</h5>
                  <div class="table-responsive text-nowrap">
                  <table class="table custom-datatable" id="table1" style="width: 100%;">
                    <thead>
                      <tr class="text-center">
                        <th><h6>รหัสคำสั่งซื้อ</h6></th>
                        <th><h6>ชื่อผู้สั่งซื้อ</h6></th>
                        <th><h6>เบอร์โทรศัพท์</h6></th>
                        <th><h6>ที่อยู่สำหรับติดตั้ง</h6></th>
                        <th><h6>วันดำเนินงาน</h6></th>
                        <th><h6>สถานะดำเนินงาน</h6></th>
                        <th><h6>รายละเอียดคำสั่งซื้อ</h6></th>
                        <th><h6>รายละเอียดงาน</h6></th>
                      </tr>
                    </thead>
                    <?php
                    include('connect.php');
                    $query = "SELECT `order`.order_id, `order`.order_address, cumtomer.tel, cumtomer.name, performance.`date_ operate`, performance.status_performance
FROM `order`
INNER JOIN cumtomer ON `order`.`cm_id` = cumtomer.cm_id
INNER JOIN performance ON `order`.`order_id` = performance.order_id
WHERE `order`.oder_status = 'ชำระเงินแล้ว'
AND performance.`date_ operate` = (
    SELECT MAX(`date_ operate`)
    FROM performance
    WHERE performance.order_id = `order`.order_id
)";

                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $data = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }

                        // Now the $data array contains the fetched data
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Close the connection
                    ?>
                    <tbody class="table-border-bottom-0">
                    <?php

                    foreach ($data as $fetch) {
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
                    ?>
                                            <tr class="text-center">
                                                <td><?php echo $fetch['order_id'] ?></td>
                                                <td><?php echo $fetch['name'] ?></td>
                                                <td><?php echo $fetch['tel'] ?></td>
                                                <td><?php echo $fetch['order_address'] ?></td>
                                                <td>
                                                <?php
                                                $date = $fetch['date_ operate'];
                                                $timestamp = strtotime($date);
                                                $buddhistYear = date("Y", $timestamp) + 543;
                                                $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                                                $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                                                $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;
                                                echo $thaiFormattedDate; ?></td>
                                                  <?php $status = $fetch['status_performance']; ?>
                                                <td><mark class="<?php echo $status === 'ดำเนินการแก้ไข' ? 'yellow' : ($status === 'ดำเนินการเสร็จสิ้น' ? 'green' : ($status === 'รอดำเนินการติดตั้งสินค้า' ? 'orang' : '')); ?>"><?php echo $status ?></mark></td>
                                                <td><button
                                                    type="button"
                                                    class="btn rounded-pill btn-icon btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exLargeModal<?php echo $fetch['order_id'] ?>"
                                                                                  >
                                                                                  <span class="bx bxs-package"></span>
                                                                                  </button></td>
                                              <td><button type="button" 
                                                      class="btn rounded-pill btn-icon btn-primary"
                                                      data-bs-toggle="modal"
                                                      data-bs-target="#timeline<?php echo $fetch['order_id'] ?>">
                                                      <span class="bx bx-search-alt-2"></span>
                                              </button></td>
                                        <?php
                                        include('modal_perform.php');
                                    }
                                        ?>
                    </tbody>
                  </table>
                </div>
                </table>
              <div class="row mt-5">
              <form action="status_order.php" method="post" onsubmit="return validateForm()">
                <p>เลือก เดือน/ปี ที่ต้องการแสดงข้อมูล สถานะการชำระเงิน และ สถานะการดำเนินงาน</p>
                <div class="col-xl-2">
                <select class="form-select mb-2" id="inputGroupSelectYear" name="year"required>
                    <option selected>ปี</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
                </div>
                <div class="col-xl-2">
                <select class="form-select" id="inputGroupSelectMonth" name="month"required>
                    <option selected>เดือน</option>
                    <option value="1">มกราคม</option>
                    <option value="2">กุมภาพันธ์</option>
                    <option value="3">มีนาคม</option>
                    <option value="4">เมษายน</option>
                    <option value="5">พฤษภาคม</option>
                    <option value="6">มิถุนายน</option>
                    <option value="7">กรกฎาคม</option>
                    <option value="8">สิงหาคม</option>
                    <option value="9">กันยายน</option>
                    <option value="10">ตุลาคม</option>
                    <option value="11">พฤศจิกายน</option>
                    <option value="12">ธันวาคม</option>
                    
</select>
</div>
<div class="col-xl-2">
      <button class="btn btn-primary mt-3 d-flex" type="submit" name="pass">แสดงข้อมูล</button>
      </div>
  </form>
  
                <div class="col-xl-6">
                <h5 class="card-header">กราฟแสดงจำนวนสถานะการชำระเงินค่ามัดจำ</h5>
                <?php if (count(array_filter($Data)) == 0) {
                    // มีข้อมูล
                    $no = "ไม่มีข้อมูล";
                } else {
                    $no = "";
                ?> <canvas id="myPieChart" width="400" height="400"></canvas>
                <?php } ?>
               
                <h1 class="no text-center"><?php echo $no; ?></h1>
                </div>
                <div class="col-xl-6">
                <h5 class="card-header">กราฟแสดงจำนวนสถานะการดำเนินงาน (ชำระเงินค่ามัดจำแล้ว)</h5>
              <?php if (count(array_filter($monthlySalesData)) == 0) {
                    // มีข้อมูล
                    $no = "ไม่มีข้อมูล";
                } else {
                    $no = "";
                ?> <canvas id="myPieChart2" width="400" height="400"></canvas>
                <?php } ?>
               
                <h1 class="no text-center"><?php echo $no; ?></h1>
                </div>
                
                </div>
    <script src="line-chart.js"></script> <!-- Your JavaScript file -->
    <script>
       // หากคุณต้องการข้อมูลตัวอย่าง
var data = {
    labels: ["รอชำระเงิน", "รอตรวจสอบ", "ชำระเงินแล้ว"],
    datasets: [{
        data: <?php echo json_encode($Data); ?>,
        backgroundColor: ["#7FB3D5", "#EC7063", "#76D7C4"]
    }]
};

// สร้าง Pie Chart
var ctx = document.getElementById('myPieChart').getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data
});

    </script>

    <script>
       // หากคุณต้องการข้อมูลตัวอย่าง
var data = {
    labels: ["รอตรวจสอบสถานที่ติดตั้ง", "รอดำเนินการแก้ไข", "รอดำเนินการติดตั้งสินค้า","ดำเนินการเสร็จสิ้น"],
    datasets: [{
        data: <?php echo json_encode($monthlySalesData); ?>,
        backgroundColor: ["#73C6B6", "#F8C471", "#5499C7 ","#F1948A"]
    }]
};

// สร้าง Pie Chart
var ctx = document.getElementById('myPieChart2').getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data
});
    </script>





<script>
function validateForm() {
  var yearSelect = document.getElementById("inputGroupSelectYear");
  var monthSelect = document.getElementById("inputGroupSelectMonth");
  var selectedYear = yearSelect.options[yearSelect.selectedIndex].value;
  var selectedMonth = monthSelect.options[monthSelect.selectedIndex].value;

  if (selectedYear === "ปี" || selectedMonth === "เดือน") {
    alert("กรุณาเลือกปีและเดือนให้ครบถ้วน");
    return false;
  }
  return true;
}
</script>      
                
                
              </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include 'footer_admin.html'; ?>
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>

          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

      
    </script>
    <!-- / Layout wrapper -->
                    
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        // DataTable สำหรับตารางที่ 1
        $('#table1').DataTable({
          language: {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/Thai.json",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sNext": "ถัดไป",
                        "sPrevious": "ก่อนหน้า"
                    },
                    "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                    "sInfo": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
                    "sInfoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                    "sLengthMenu": "แสดง _MENU_ รายการ",
                    "sSearch": "ค้นหา:",
                    "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา"
                },
                searching: true, paging: true, info: true
        });
        var searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("input", function() {
        dataTable.search(searchInput.value).draw();
  });
    });
</script>
    <script>
        $(document).ready(function() {
            var table = $('#table1').DataTable();
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
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