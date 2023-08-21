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
    <link rel="stylesheet" type="text/css" href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">
    <script src="../assets/js/config.js"></script>
  </head>
<style>
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
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">หน้าหลัก</div>
              </a>
            </li>


            <!-- จัดการข้อมูล -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">จัดการข้อมูล</span>
            </li>
            <li class="menu-item">
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Basic">หน้าร้าน</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="cm.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Basic">ลูกค้า</div>
              </a>
            </li>

            <!-- DropDown -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-package'></i>
                <div data-i18n="Account Settings">สินค้า</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="category.php" class="menu-link active">
                    <div data-i18n="Account">ประเภทสินค้า</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="product.php" class="menu-link">
                    <div data-i18n="Notifications">สินค้า</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- DropDown -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-book'></i>
                <div data-i18n="Account Settings">ออเดอร์</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="man_order.php" class="menu-link">
                    <div data-i18n="Account">คำสั่งซื้อ</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="man_operate.php" class="menu-link">
                    <div data-i18n="Notifications">สถานะคำสั่งซื้อ</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- END จัดการข้อมูล -->



            <!-- จัดการข้อมูล -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">รายงาน</span>
            </li>
            <!-- END จัดการข้อมูล -->



            <!-- จัดการข้อมูล -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-coin'></i>
                <div data-i18n="Account Settings">รายได้</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Account">รายเดือน</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">ประเภทสินค้า</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- END จัดการข้อมูล -->



            <!-- ลูกค้าใหม่ -->
            <li class="menu-item">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                <div data-i18n="Basic">ลูกค้าใหม่รายเดือน</div>
              </a>
            </li>

            <!-- รายงานสถานะการติดตั้งสินค้าตามวันและเวลา -->
            <li class="menu-item">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Basic">สถานะการติดตั้ง</div>
              </a>
            </li>


            <!-- ความคิดเห็นลูกค้า -->
            <li class="menu-item">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-rounded"></i>
                <div data-i18n="Basic">ความคิดเห็นลูกค้า</div>
              </a>
            </li>





            <!-- Components -->
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li> -->
            <!-- Cards -->
            <!-- <li class="menu-item">
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Cards</div>
              </a>
            </li> -->
            <!-- User interface -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">User interface</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="ui-accordion.html" class="menu-link">
                    <div data-i18n="Accordion">Accordion</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-alerts.html" class="menu-link">
                    <div data-i18n="Alerts">Alerts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-badges.html" class="menu-link">
                    <div data-i18n="Badges">Badges</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-buttons.html" class="menu-link">
                    <div data-i18n="Buttons">Buttons</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-carousel.html" class="menu-link">
                    <div data-i18n="Carousel">Carousel</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-collapse.html" class="menu-link">
                    <div data-i18n="Collapse">Collapse</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-dropdowns.html" class="menu-link">
                    <div data-i18n="Dropdowns">Dropdowns</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-footer.html" class="menu-link">
                    <div data-i18n="Footer">Footer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-list-groups.html" class="menu-link">
                    <div data-i18n="List Groups">List groups</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-modals.html" class="menu-link">
                    <div data-i18n="Modals">Modals</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-navbar.html" class="menu-link">
                    <div data-i18n="Navbar">Navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-offcanvas.html" class="menu-link">
                    <div data-i18n="Offcanvas">Offcanvas</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                    <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-progress.html" class="menu-link">
                    <div data-i18n="Progress">Progress</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-spinners.html" class="menu-link">
                    <div data-i18n="Spinners">Spinners</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tabs-pills.html" class="menu-link">
                    <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-toasts.html" class="menu-link">
                    <div data-i18n="Toasts">Toasts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tooltips-popovers.html" class="menu-link">
                    <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-typography.html" class="menu-link">
                    <div data-i18n="Typography">Typography</div>
                  </a>
                </li>
              </ul>
            </li> -->

            <!-- Extended components -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Extended UI</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="extended-ui-text-divider.html" class="menu-link">
                    <div data-i18n="Text Divider">Text Divider</div>
                  </a>
                </li>
              </ul>
            </li> -->

            <!-- <li class="menu-item">
              <a href="icons-boxicons.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Boxicons</div>
              </a>
            </li> -->

            <!-- Forms & Tables -->
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li> -->
            <!-- Forms -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Form Elements</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="forms-basic-inputs.html" class="menu-link">
                    <div data-i18n="Basic Inputs">Basic Inputs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="forms-input-groups.html" class="menu-link">
                    <div data-i18n="Input groups">Input groups</div>
                  </a>
                </li>
              </ul>
            </li> -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Form Layouts</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="form-layouts-vertical.html" class="menu-link">
                    <div data-i18n="Vertical Form">Vertical Form</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="form-layouts-horizontal.html" class="menu-link">
                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                  </a>
                </li>
              </ul>
            </li> -->
            <!-- Tables -->
            <!-- <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li> -->
            <!-- Misc -->
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li> -->
            <!-- <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li> -->
            <!-- <li class="menu-item">
              <a
                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li> -->
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
                    id = "searchInput"
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
                      <img src="../assets/img/avatars/admin.jpg" alt class="w-px-30 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/admin.jpg" alt class="w-px-30 h-auto rounded-circle" />
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
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pages-account-settings-account.html">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> -->
                    <li>
                      <div class="dropdown-divider"></div>
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
$query = mysqli_query($conn, "SELECT `order`.order_id, `order`.order_address, cumtomer.tel, cumtomer.name, performance.`date_ operate`, performance.status_performance
 FROM `order`
 INNER JOIN cumtomer ON `order`.`cm_id` = cumtomer.cm_id
 INNER JOIN performance ON `order`.`order_id` = performance.order_id
 WHERE `order`.oder_status = 'อนุมัติ'
 AND performance.`date_ operate` = (
     SELECT MAX(`date_ operate`)
     FROM performance
     WHERE performance.order_id = `order`.order_id
 )
 ");
?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
              <div class="add demo-inline-spacing">
              <div class="row mb-5">
              <div class="col-md-6 col-lg-5 mb-3">
                  <div class="card">
                    <div class="card-body">
                    <div class="row mb-5">
                     <div class="col-xl-2">
                     <i class='bx bx-brightness-half' style='color:#696cff'></i>
                      </div>
                      <div class="col-xl-10">
                      <h5 class="card-title">งานวันนี้</h5>
                      <p class="card-text">
                        วันที่ 24 ธันวาคม 2544
                      </p>
                       </div>
                </div>
                <hr>
                <button
                  type="button"
                  class="btn rounded-pill btn-icon btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#exLargeModal<?php echo $fetch['order_id'] ?>">
                  <span class="bx bxs-package"></span>
                  </button>
                  <button type="button" 
                  class="btn rounded-pill btn-icon btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#timeline<?php echo $fetch['order_id'] ?>">
                  <span class="bx bx-search-alt-2"></span>
                </button>
                                              <?php echo "<a class='btn rounded-pill btn-icon btn-primary bx bx-calendar-edit' href='test_calendar.php?id=" . $fetch['order_id'] . "'></a>"; ?>
                                         
                    </div>
                  </div>
                </div>   
                <div class="col-md-6 col-lg-7 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">ค้นหาสถานะการดำเนินงาน</h5>
                      <p class="card-text">
                        กดปุ่มเพื่อค้นหาสถานะที่ต้องการ
                      </p>
                      <button type="button"class="btn btn-primary" onclick=setSearchValueall()>ทั้งหมด</button>
                      <button type="button"class="btn btn-primary mx-3" onclick=setSearchValue()>รอตรวจสอบสถานที่ติดตั้ง</button>
                      <button type="button"class="btn btn-primary mx-3" onclick=setSearchValuepayment()>รอดำเนินการแก้ไข</button>
                      <button type="button"class="btn btn-primary mx-3" onclick=setSearchValuepass()>รอดำเนินการติดตั้งสินค้า</button>
                    </div>
                  </div>
                </div>   
              </div>  
              </div>
              
                <h5 class="card-header">ตารางข้อมูลดำเนินงาน (คำสั่งซื้อที่อนุมัติแล้ว)</h5>
              
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
                        <th><h6>จัดการผลการดำเนินงาน</h6></th>
                        <th><h6>สำเร็จการดำเนินงาน</h6></th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    while ($fetch = mysqli_fetch_array($query)) {
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
                                                <td class="text-center"><?php echo "<a class='btn rounded-pill btn-icon btn-primary bx bx-calendar-edit' href='test_calendar.php?id=" . $fetch['order_id'] . "'></a>"; ?></td>
                                                <?php if ($status === 'รอดำเนินการติดตั้งสินค้า') {
                                                ?><td><button type="button" 
                                                  class="btn rounded-pill btn-icon btn-success"
                                                  onclick="confirmUpdate(<?php echo $fetch['order_id']; ?>, '<?php echo $fetch['date_ operate']; ?>')">
                                                  <span class="bx bx-check"></span>
                                          </button></td>
                                                <?php } else {
                                                ?>
                                                <td>ไม่สามารถใช้งานได้</td>
                                               <?php } ?>
                                            </tr>
                                        <?php
                                        include('modal_perform.php');
                                      }
                                        ?>
                    </tbody>
                  </table>
                </div>
                
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
   function confirmUpdate(orderId, dateOperate) {
    Swal.fire({
        title: "Confirmation",
        text: `Are you sure you want to update the order with ID ${orderId} and date ${dateOperate}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, update it!",
        cancelButtonText: "No, cancel",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed, proceed with the update
            $.ajax({
                url: 'update_script.php',
                type: 'POST',
                data: {
                    orderId: orderId,
                    dateOperate: dateOperate
                },
                success: function(response) {
                    var parsedResponse = JSON.parse(response);
                    
                    if (parsedResponse.status === "success") {
                        Swal.fire({
                            title: "Success",
                            text: parsedResponse.msg,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            // Reload the page or perform other actions
                            location.reload();
                        });
                    } else if (parsedResponse.status === "error") {
                        Swal.fire({
                            title: "Error",
                            text: parsedResponse.msg,
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // User canceled
            Swal.fire("Cancelled", "The update has been cancelled.", "info");
        }
    });
}

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
    <script>
        function setSearchValue() {
          var searchInput = document.getElementById("searchInput");
          searchInput.value = "รอชำระเงิน";

          var dataTable = $('#table1').DataTable();
          dataTable.search(searchInput.value).draw();
        }
        function setSearchValuepayment(){
          var searchInput = document.getElementById("searchInput");
          searchInput.value = "รอการตรวจสอบ";

          var dataTable = $('#table1').DataTable();
          dataTable.search(searchInput.value).draw();
        }
        function setSearchValuepass(){
          var searchInput = document.getElementById("searchInput");
          searchInput.value = "อนุมัติ";

          var dataTable = $('#table1').DataTable();
          dataTable.search(searchInput.value).draw();
        }
        function setSearchValueall(){
          var searchInput = document.getElementById("searchInput");
          searchInput.value = "";

          var dataTable = $('#table1').DataTable();
          dataTable.search(searchInput.value).draw();
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