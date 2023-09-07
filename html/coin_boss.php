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
            <li class="menu-item active open">
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
                <li class="menu-item  active">
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
            <li class="menu-item">
              <a href="status_boss.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Basic">สถานะการติดตั้ง</div>
              </a>
            </li>


            <!-- ความคิดเห็นลูกค้า -->
            <li class="menu-item">
              <a href="comment_chart.php" class="menu-link">
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

          <!-- / Navbar -->
<?php include('connect.php');
if (isset($_POST['year'])) {
    $year = (int)$_POST['year'];
    $query = mysqli_query($conn, "SELECT
category.cat_name,
oderdetail.oder_qty,
performance.`date_ operate`,
performance.status_performance
FROM
 `order`
INNER JOIN performance ON `order`.`order_id` =  performance.order_id
INNER JOIN oderdetail ON oderdetail.oder_id = `order`.`order_id`
INNER JOIN product ON product.product_id = oderdetail.product_id
INNER JOIN category ON category.id_cat = product.category_id
WHERE performance.status_performance = 'ดำเนินการเสร็จสิ้น'
AND YEAR(performance.`date_ operate`) = $year;
");
    if ($query) {
        $totalQty = 0; // สำหรับรวมค่า 'oder_qty' ทั้งหมด
        $Data1 = array_fill(0, 12, 0); // สำหรับประเภท 'หน้าต่างบานเลื่อน'
        $Data2 = array_fill(0, 12, 0); // สำหรับประเภท 'หน้าต่างบานพับ'
        $Data3 = array_fill(0, 12, 0); // สำหรับประเภท 'หน้าต่างห้องน้ำ'
        $Data4 = array_fill(0, 12, 0); // สำหรับประเภท 'ประตูบานเลื่อน'
        $Data5 = array_fill(0, 12, 0); // สำหรับประเภท 'ประตูบานพับ'

        while ($row = mysqli_fetch_assoc($query)) {
            $dateOperate = $row['date_ operate'];
            $month = date('n', strtotime($dateOperate));

            // เช็คประเภทสินค้าและกำหนดค่าในอาร์เรย์ที่เหมาะสมตามเดือน
            if ($row['cat_name'] == 'หน้าต่างบานเลื่อน') {
                $Data1[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'หน้าต่างบานพับ') {
                $Data2[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'หน้าต่างห้องน้ำ') {
                $Data3[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'ประตูบานเลื่อน') {
                $Data4[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'ประตูบานพับ') {
                $Data5[$month - 1] += $row['oder_qty'];
            }
            $totalQty += $row['oder_qty'];
        }
    }
} else {
    $year = 2023;
    $query = mysqli_query($conn, "SELECT
category.cat_name,
oderdetail.oder_qty,
performance.`date_ operate`,
performance.status_performance
FROM
 `order`
INNER JOIN performance ON `order`.`order_id` =  performance.order_id
INNER JOIN oderdetail ON oderdetail.oder_id = `order`.`order_id`
INNER JOIN product ON product.product_id = oderdetail.product_id
INNER JOIN category ON category.id_cat = product.category_id
WHERE performance.status_performance = 'ดำเนินการเสร็จสิ้น'
AND YEAR(performance.`date_ operate`) = $year;
");
    if ($query) {
        $totalQty = 0; // สำหรับรวมค่า 'oder_qty' ทั้งหมด
        $Data1 = array_fill(0, 12, 0); // สำหรับประเภท 'หน้าต่างบานเลื่อน'
        $Data2 = array_fill(0, 12, 0); // สำหรับประเภท 'หน้าต่างบานพับ'
        $Data3 = array_fill(0, 12, 0); // สำหรับประเภท 'หน้าต่างห้องน้ำ'
        $Data4 = array_fill(0, 12, 0); // สำหรับประเภท 'ประตูบานเลื่อน'
        $Data5 = array_fill(0, 12, 0); // สำหรับประเภท 'ประตูบานพับ'

        while ($row = mysqli_fetch_assoc($query)) {
            $dateOperate = $row['date_ operate'];
            $month = date('n', strtotime($dateOperate));

            // เช็คประเภทสินค้าและกำหนดค่าในอาร์เรย์ที่เหมาะสมตามเดือน
            if ($row['cat_name'] == 'หน้าต่างบานเลื่อน') {
                $Data1[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'หน้าต่างบานพับ') {
                $Data2[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'หน้าต่างห้องน้ำ') {
                $Data3[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'ประตูบานเลื่อน') {
                $Data4[$month - 1] += $row['oder_qty'];
            } elseif ($row['cat_name'] == 'ประตูบานพับ') {
                $Data5[$month - 1] += $row['oder_qty'];
            }
            $totalQty += $row['oder_qty'];
        }
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
                <div class="col-md-6 col-lg-7 mb-3">
                  <div class="card">
                  <div class="row">
                    <div class="card-body col-xl-6 col-divider">
                      <h5 class="card-title">สิ้นค้าขายทั้งหมด</h5>
                      <p class="card-text">
                        จำนวนสิ้นค้าทุกประเภทที่ขายไปทั้งหมดปี(<?php echo $year ?>)
                      </p>
                    </div>
                    <div class="card-body col-xl-6">
                      <h1 class="card-title text-center coin"><?php
                                                                $formattedNum = number_format($totalQty);
                                                                echo  $formattedNum ?> ชิ้น</h1>
                    </div>
                    </div>
                  </div>
                </div>   
              </div>  
              </div>
                <h5 class="card-header">กราฟแสดงจำนวนสินที่ถูกซื้อแต่ละประเภทสินค้า</h5>
                <form action="category_chart.php" method="post">
                <select class="form-select" id="inputGroupSelect01" name="year">
                    <option>เลือกสินค้าที่ถูกซื้อทั้งหมด(ปี)</option>
                    <option  value="2022"<?php if ($year == "2022") echo "selected"; ?>>2022</option>
                    <option  value="2023"<?php if ($year == "2023") echo "selected"; ?>>2023</option>
                    <option  value="2024"<?php if ($year == "2024") echo "selected"; ?>>2024</option>
                </select>
      <button class="btn btn-primary mt-3 d-flex" type="submit" name="pass">แสดงข้อมูล</button>
  </form>
                <canvas id="barChart" width="70" height="20"></canvas>
                </div>
<script src="bar-chart.js"></script> <!-- Your JavaScript file -->
<script>
    // Get the canvas element
    var ctx = document.getElementById('barChart').getContext('2d');

    // Chart configuration
    var chartConfig = {
        type: 'bar',
            data: {
        labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
        datasets: [{
            label: 'หน้าต่างบานเลื่อน',
            data:  <?php echo json_encode($Data1); ?>,
            backgroundColor: '#DE3163',
            borderColor: '#DE3163',
            borderWidth: 1
        },
        {
            label: 'หน้าต่างบานพับ',
            data:  <?php echo json_encode($Data2); ?>,
            backgroundColor: '#FFBF00',
            borderColor: '#FFBF00',
            borderWidth: 1
        },
        { 
            label: 'หน้าต่างห้องน้ำ',
            data:  <?php echo json_encode($Data3); ?>,
            backgroundColor: '#40E0D0',
            borderColor: '#40E0D0',
            borderWidth: 1
        },
        { 
            label: 'ประตูบานเลื่อน',
            data:  <?php echo json_encode($Data4); ?>,
            backgroundColor: '#CCCCFF',
            borderColor: '#CCCCFF',
            borderWidth: 1
        },
        { 
            label: 'ประตูบานพับ',
            data:  <?php echo json_encode($Data5); ?>,
            backgroundColor: '#6495ED',
            borderColor: '#6495ED',
            borderWidth: 1
        }]
        
    },
        
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Create the bar chart
    var barChart = new Chart(ctx, chartConfig);


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