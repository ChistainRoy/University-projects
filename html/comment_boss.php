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
        font-size: 20px;
    color: #696cff;
  }
  .no{
    margin-top: 20%;
    
  }
  .star-rating {
        font-size: 30px;
    }

    .star {
        cursor: pointer;
        color: lightgray;
        font-size: 40px;
    }

    .star.active {
        color: gold;
    }
    .order{
      margin-left: 90%;
      background-color: #696cff;
      color: white;
      border-radius: 20px;
      max-width: 100%;
      text-align: center;
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
            <li class="menu-item">
              <a href="status_boss.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Basic">สถานะการติดตั้ง</div>
              </a>
            </li>


            <!-- ความคิดเห็นลูกค้า -->
            <li class="menu-item active">
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
<?php
include('connect.php');
$dataArray = array();
$Count = array_fill(0, 2, 0);
$Star = array_fill(0, 4, 0);
$query = mysqli_query($conn, "SELECT cumtomer.name, `order`.`order_id`, performance.status_performance, comment.comment_detail, comment.comment_img 
FROM `order` 
LEFT JOIN cumtomer ON `order`.`cm_id` = cumtomer.cm_id
LEFT JOIN performance ON `order`.`order_id` = performance.order_id 
LEFT JOIN comment ON `order`.`order_id` = comment.order_id WHERE performance.status_performance = 'ดำเนินการเสร็จสิ้น';
");
while ($row = mysqli_fetch_assoc($query)) {
    $dataArray[] = $row;
    if (empty($row['comment_img'])) {
        $Count[1]++;
    } else {
        $Count[0]++;
        if ($row['comment_img'] == 1) {
            $Star[0]++;
        } elseif ($row['comment_img'] == 2) {
            $Star[1]++;
        } elseif ($row['comment_img'] == 3) {
            $Star[2]++;
        } elseif ($row['comment_img'] == 4) {
            $Star[3]++;
        } elseif ($row['comment_img'] == 5) {
            $Star[4]++;
        }
    }
}
// ตัวอย่างข้อมูล
$total = array_sum($Count);

// คำนวณค่าเปอร์เซ็นต์และใส่ลงในอาร์เรย์ใหม่
$percentages = array();
foreach ($Count as $value) {
    $percentage = ($value * 100) / $total;
    $percentages[] = $percentage;
}

// print_r($Star);
$sum = array_sum($Star);
// echo $sum;
foreach ($Star as $Stars) {
    $percentage = ($Stars * 100) / $sum;
    $percent_2[] = $percentage;
}
// print_r($percent_2);
?>
    <!-- / Navbar -->
    <div class="content-wrapper">
    <!-- Content chart -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-xl-4">
              <div class="card">
              <div class="card-body d-flex justify-content-center align-items-center">
              
                <div class="center" style="width: 300px;">
                <p class="text-center">ความคิดเห็นทั้งหมดแต่ละคะแนนโดยเฉลี่ย</p>
                    <canvas id="myPieChart"></canvas>
                    <script src="line-chart.js"></script>
                </div>
                </div>
              </div>
              </div>
              </div>
          </div>
<?php
// จำนวนข้อมูลในแต่ละหน้า
$perPage = 6;

// หาหน้าปัจจุบัน
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// ตรวจสอบการค้นหา
$search = isset($_GET['search']) ? $_GET['search'] : '';

// คำนวณตำแหน่งเริ่มต้นในอาเรย์
$start = ($currentPage - 1) * $perPage;

// กรองข้อมูลตามการค้นหา
$filteredData = array_filter($dataArray, function ($data) use ($search) {
    if (empty($search)) {
        return true; // ไม่มีการค้นหา, แสดงทุกข้อมูล
    }

    // กรองตามคำค้นหา
    return stripos($data['name'], $search) !== false ||
        stripos($data['order_id'], $search) !== false ||
        stripos($data['comment_detail'], $search) !== false ||
        stripos($data['comment_img'], $search) !== false;
});

// จำนวนหน้าทั้งหมด
$totalPages = ceil(count($filteredData) / $perPage);

// ตัดข้อมูลออกมาสำหรับหน้าปัจจุบัน
$currentPageData = array_slice($filteredData, $start, $perPage);
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
   <!-- เพิ่มแบบฟอร์มค้นหา -->
        <div class="card">
            <div class="add demo-inline-spacing">
                <div class="row mb-5">
                    <?php foreach ($currentPageData as $data) {
                        if (!empty($data['comment_img'])) {
                    ?>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card">
                              <h3 class="p-1 order">#<?php echo $data['order_id']; ?></h3>
                                <div class="row">
                                    <div class="card-body col-xl-6">
                                        <h5 class="card-title"><i class='bx bxs-user-circle p-1' style='color:#696cff; font-size: 36px;'  ></i><?php echo $data['name']; ?></h5>
                                       
                                        <!-- <h5 class="card-title">คะแนนความพึงพอใจ: <?php echo $data['comment_img']; ?></h5> -->
                                        <h5 class="card-title p-1">ความคิดเห็นลูกค้า: <?php echo $data['comment_detail']; ?></h5>
                                        <h1 class="d-none"><?php echo $data['comment_img']; ?></h5>
                                         <div class="star-rating">
                      <?php
                            $rating = $data['comment_img']; // แปลงคะแนนเป็นจำนวนเต็ม

                            // วนลูปสร้างดาวตามคะแนน
                            for ($i = 1; $i <= 4; $i++) {
                                if ($i <= $rating) {
                                    // ถ้า $i น้อยกว่าหรือเท่ากับคะแนน ให้ใช้ class "active" เพื่อเปิดดาว
                                    echo '<span class="star active">&#9733;</span>';
                                } else {
                                    // ถ้า $i มากกว่าคะแนน ให้ไม่ใช้ class "active" เพื่อปิดดาว
                                    echo '<span class="star">&#9733;</span>';
                                }
                            }
                        ?>
</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    } ?>
                </div>
                <!-- เพิ่มปุ่มเปลี่ยนหน้า -->
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <!-- Content wrapper -->
</div>
</div>

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
       // หากคุณต้องการข้อมูลตัวอย่าง
var data = {
    labels: ["พอใช้", "ดี", "ดีมาก","เยี่ยม"],
    datasets: [{
        data: <?php echo json_encode($percent_2); ?>,
        backgroundColor: ["#FF5F5F", "#FFF55F", "#97FF5F","#5F6BFF"]
    }]
};

// สร้าง Pie Chart
var ctx = document.getElementById('myPieChart').getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.dataset.label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += context.formattedValue + ' %'; // เพิ่ม % ตามหลังค่าเปอร์เซ็นต์
                        return label;
                    }
                }
            }
        }
    }
});

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