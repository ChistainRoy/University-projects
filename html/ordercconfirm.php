<?php
session_start();
$storedArray = $_SESSION['values'];
$storedArray2 = $_SESSION['productid'];
// print_r($storedArray2);
// print_r($storedArray);
// echo $_SESSION['date'];
// echo $_SESSION['newaddress'];
// $combinedArray = array_combine($storedArray2,  $storedArray);
// print_r($combinedArray);
//  Loop through the value
?>
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
  class="light-style customizer-hide"
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

    <title>Login - Pages | Buddy Aluminium</title>

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

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>
  <style>
   .paper {
  background: #fff;
  box-shadow: 4px 4px 0 #696cff;
}
.detail{
font-size: 13px;
}
  </style>
  <body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card paper">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <img src="upload/B.png" width="50">
                  <span class="app-brand-text demo text-body fw-bolder">บัดดี้อลูมิเนียม</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="text-center">ยืนยันคำสั่งซื้อสินค้า</h4>
              <br>
              <p class="mb-4">รายละเอียดคำสั่งซื้อ</p>
              <hr>
              <?php $totals = array(); ?>
              <?php $combinedArray = array_combine($storedArray2,  $storedArray);
               foreach ($combinedArray as $productID => $value) {
                  include('connect.php');
                  // echo "Product ID: " . $productID . ", Value: " . $value . "<br>";
                  $sql = "SELECT * FROM product WHERE product_id = '$productID'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  $price = $row['product_price'];
                  $name = $row['product_name'];
                  $total = $price  *  $value;
                  $totals[] = $total;
                  // echo $total . "<br>";
                  // $sqlinsert = "INSERT INTO `oderdetail` (`oder_id`, `product_id`, `oder_price`, `oder_qty`) VALUES ('$lastId', '$productID', '$total', '$value')";
                  // $resultinsert = mysqli_query($conn, $sqlinsert);
               ?><form id="formAuthentication" class="" action="order_db.php" method="POST">
               <h5 class="fw-bold">-<?php echo $name ?></h5><p class="detail"> ราคา <?php echo  $price ?> ฿ x  <?php echo  $value ?></p>
               <?php
               }
               $sum = array_sum($totals);
               ?>
               <hr>
               <h5 class="fw-bold">ราคาทั้งหมด</h5>
               <p class="detail"><?php echo  $sum ?> ฿</p>
               <?php $_SESSION['sum'] = $sum;?>
               <h5 class="fw-bold">วันจองตรวจสอบสถานที่ติดตั้ง</h5>
               <p class="detail"><?php echo $_SESSION['date']; ?></p>
               <hr>
               <h5 class="fw-bold">ที่อยู่สำหรับตรวจสอบสถานที่ติดตั้ง</h5>
               <p class="detail"><?php echo $_SESSION['fullname']; ?></p>
               <p class="detail"><?php echo $_SESSION['tel']; ?></p>
               <p class="detail"><?php echo $_SESSION['newaddress']; ?></p>
                  <button class="btn btn-primary d-grid w-100" type="submit" name="order">ยืนยันคำสั่งซื้อ</button>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>