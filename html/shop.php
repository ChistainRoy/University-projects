<!DOCTYPE html>

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

    <title>Dashboard - Home</title>

    <meta name="description" content="" />

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

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>
  <body>
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
  <style>
.danger{
  color: red;
}
/* CSS เพื่อควบคุมการแสดงผลของแผนที่ให้ปรับขนาดตามหน้าจอ */
.map-container {
    position: relative;
    padding-bottom: 56.25%; /* สัดส่วนของแผนที่ (16:9) */
    overflow: hidden;
    max-width: 100%;
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}


  </style>
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
            <li class="menu-item active">
              <a href="shop.php" class="menu-link">
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
              <a href="product.php" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-package'></i>
                <div data-i18n="Account Settings">สินค้า</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="category.php" class="menu-link">
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
            <li class="menu-item">
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
                <li class="menu-item">
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
                  <a href="information_coin.php" class="menu-link">
                    <div data-i18n="Account">รายเดือน</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="category_chart.php" class="menu-link">
                    <div data-i18n="Notifications">ประเภทสินค้า</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- END จัดการข้อมูล -->
            <!-- ลูกค้าใหม่ -->
            <li class="menu-item">
              <a href="customer_new.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                <div data-i18n="Basic">ลูกค้าใหม่รายเดือน</div>
              </a>
            </li>

            <!-- รายงานสถานะการติดตั้งสินค้าตามวันและเวลา -->
            <li class="menu-item">
              <a href="status_order.php" class="menu-link">
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

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
<?php include('connect.php');
$sql = "SELECT * 
FROM `shop`
JOIN `employee` ON `shop`.`em_id` = `employee`.`em_id`
";
$success = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($success);
?>
            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <div class="row">
              <div class="col-xl-4">
    <form action="shop_upload.php" method="post" enctype="multipart/form-data" class="card-body">
        <h3 class="py-2">สไลด์เริ่มต้น</h3>
        <label for="fileUpload" id="imagePreviewLabel">
            <img src="<?php echo $row['img_1'] ?>" alt="Upload Image" class="img-fluid" id="imagePreview">
        </label>
        <input type="file" id="fileUpload" name="fileUpload" style="display: none;">
        <input type="hidden" value="1" name="one">
        <p class="py-2 danger">*ขนาดรูปต้องไม่ต่ำกว่า (1600 X 900)</p>
        <button class="btn btn-primary" type="submit" value="อัปโหลดไฟล์" name="submit">อัปโหลดรูปภาพ</button>
    </form>
</div>
<div class="col-xl-4">
    <form action="shop_upload.php" method="post" enctype="multipart/form-data" class="card-body">
        <h3 class="py-2">สไลด์ที่ 2</h3>
        <label for="fileUpload2" id="imagePreviewLabel2"> <!-- เปลี่ยน ID ให้ไม่ซ้ำกับฟอร์มแรก -->
            <img src="<?php echo $row['img_2'] ?>" alt="Upload Image" class="img-fluid" id="imagePreview2">
        </label>
        <input type="file" id="fileUpload2" name="fileUpload" style="display: none;">
        <input type="hidden" value="2" name="two">
        <p class="py-2 danger">*ขนาดรูปต้องไม่ต่ำกว่า (1600 X 900)</p>
        <button class="btn btn-primary" type="submit" value="อัปโหลดไฟล์" name="submit">อัปโหลดรูปภาพ</button>
    </form>
</div>
<div class="col-xl-4">
    <form action="shop_upload.php" method="post" enctype="multipart/form-data" class="card-body">
        <h3 class="py-2">สไลด์ที่ 3</h3>
        <label for="fileUpload3" id="imagePreviewLabel3"> <!-- เปลี่ยน ID ให้ไม่ซ้ำกับฟอร์มแรกและฟอร์มที่สอง -->
            <img src="<?php echo $row['img_3'] ?>" alt="Upload Image" class="img-fluid" id="imagePreview3">
        </label>
        <input type="file" id="fileUpload3" name="fileUpload" style="display: none;">
        <input type="hidden" value="3" name="three">
        <p class="py-2 danger">*ขนาดรูปต้องไม่ต่ำกว่า (1600 X 900)</p>
        <button class="btn btn-primary" type="submit" value="อัปโหลดไฟล์" name="submit">อัปโหลดรูปภาพ</button>
    </form>
</div>
    </div>
    <script>
    // สร้างฟังก์ชัน JavaScript สำหรับแสดงตัวอย่างรูปภาพสำหรับฟอร์มแรก
    function setupImagePreview(fileInputId, imagePreviewId, imagePreviewLabelId) {
        // เมื่อมีการเลือกไฟล์ในอินพุตไฟล์
        document.getElementById(fileInputId).addEventListener('change', function() {
            // รับค่าไฟล์ที่ถูกเลือก
            const selectedFile = this.files[0];

            // ตรวจสอบว่าไฟล์ถูกเลือกและเป็นไฟล์รูปภาพ
            if (selectedFile && selectedFile.type.startsWith('image/')) {
                // อ่านและแสดงรูปตัวอย่าง
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imagePreview = document.getElementById(imagePreviewId);
                    imagePreview.src = event.target.result;
                    imagePreview.style.display = 'block'; // แสดงรูปตัวอย่าง
                };
                reader.readAsDataURL(selectedFile);

                // แสดงป้ายกำกับรูปภาพ
                const imagePreviewLabel = document.getElementById(imagePreviewLabelId);
                imagePreviewLabel.style.display = 'block';
            }
        });
    }

    // เรียกใช้ฟังก์ชันสำหรับแต่ละฟอร์ม
    setupImagePreview('fileUpload', 'imagePreview', 'imagePreviewLabel');
    setupImagePreview('fileUpload2', 'imagePreview2', 'imagePreviewLabel2');
    setupImagePreview('fileUpload3', 'imagePreview3', 'imagePreviewLabel3');
</script>
<div class="col-xl-6 p-5">
                        <h5 class="text-center">ช่องทางติดต่อทางร้าน</h5>
                        <p class="danger">
                            ผู้เปลี่ยนแปลงล่าสุด : <?php echo $row['name'] ?>
                        </p>
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
                        <p>ที่อยู่ใน google map : <div class="map-container d-flex justify-content-center align-items-center">
                        <?php echo $row['google'] ?>
</div></p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">แก้ไข</button>    
        <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขข้อมูลเกี่ยวกับร้าน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                <form action="shop_upload.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">ชื่อเจ้าของร้าน</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class='bx bxs-user'></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-company"
                        class="form-control"
                        value=""
                        aria-label="ACME Inc."
                        aria-describedby="basic-icon-default-company2"
                        name="name"
                        required
                      />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">ที่อยู่</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class='bx bxs-home' ></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-company"
                        class="form-control"
                        value=""
                        aria-label="ACME Inc."
                        aria-describedby="basic-icon-default-company2"
                        name="address"
                        required
                      />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">เบอร์โทร</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class='bx bxs-phone' ></i></span>
                      <input
                        type="number"
                        id="basic-icon-default-company"
                        class="form-control"
                        value=""
                        aria-label="ACME Inc."
                        aria-describedby="basic-icon-default-company2"
                        name="phones"
                        required
                      />
                    </div>  
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">อีเมล</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class='bx bxs-phone' ></i></span>
                      <input
                        type="email"
                        id="basic-icon-default-company"
                        class="form-control"
                        value=""
                        aria-label="ACME Inc."
                        aria-describedby="basic-icon-default-company2"
                        name="email"
                        required
                      />
                    </div>  
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">ลิงค์ Facebook Fanpage</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class='bx bx-link' ></i></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-company"
                        class="form-control"
                        value=""
                        aria-label="ACME Inc."
                        aria-describedby="basic-icon-default-company2"
                        name="link"
                        required
                      />
                    </div>  
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">ลิงค์ google map</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class='bx bx-link' ></i></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-company"
                        class="form-control"
                        value=""
                        aria-label="ACME Inc."
                        aria-describedby="basic-icon-default-company2"
                        name="linkgoogle"
                        required
                      />
                    </div>  
                  </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary" name="data">บันทึก</button>
            </form>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>
                  </div>
                </div>
              </div>
              <div class="row">
              </div>
            </div>
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (isset($_SESSION['errors'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด',
            text: '<?php echo $_SESSION['errors']; ?>',
        });
    </script>
<?php unset($_SESSION['errors']);
    endif; ?>

<?php if (isset($_SESSION['success'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: '<?php echo $_SESSION['success']; ?>',
        }).then(function() {
            // เมื่อผู้ใช้กด OK ใน Swal.fire จะเปลี่ยนเส้นทางไปหน้าอื่น
            window.location.href = 'shop.php';
        });
    </script>
<?php unset($_SESSION['success']);
endif; ?>
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