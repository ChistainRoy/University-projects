<?php
session_start();
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
        /* Custom styles for the title (message) and the entire toast */
        .swal-title {
            font-size: 24px;
        }

        .swal-popup {
            max-width: 700px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
  <body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <img src="upload/B.png" width="50">
                  <span class="app-brand-text demo text-body fw-bolder">บัดดี้อลูมิเนียม</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">ยินดีต้อนรับสู่ ร้านบัดดี้อลูมิเนียม! 👋</h4>
              <p class="mb-4">กรุณาเข้าสู่ระบบเพื่อสั่งซื้อสินค้าของเรา</p>

              <form id="formAuthentication" class="mb-3" action="login_db.php" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">ชื่อผู้ใช้</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">รหัสผ่าน</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>ลืมรหัสผ่าน?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="submitlogin">เข้าสู่ระบบ</button>
                </div>
              </form>

              <p class="text-center">
                <a href="auth-register-basic.php">
                  <span>สมัครสมาชิก</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
      $(document).ready(function () 
      {$("#formAuthentication").submit(function 
        (e){
                    e.preventDefault();
          let fromurl = $(this).attr("action");
          let reqMethod = $(this).attr("method")
          let formdata = $(this).serialize();
          $.ajax({
            url: fromurl,
            type: reqMethod,
            data: formdata,
            success: function(data) {
              let result = JSON.parse(data);
              if(result.status == "success"){
                console.log("Success", result)
                Swal.fire({
                title: result.msg,
                icon: result.status,
                toast: true,
                position: "top",
                showConfirmButton: false,
                timer: 3000, // 3 seconds
                customClass: {
                    title: 'swal-title', // Custom class for title
                    popup: 'swal-popup', // Custom class for the entire toast
                }
            }).then(() => {
                // Redirect after the toast is closed
                window.location.href = "index_user.php";
            });
              } else if (result.status == "info"){
              console.log("Success", result)
              Swal.fire({
                title: result.msg,
                icon: 'success',
                toast: true,
                position: "top",
                showConfirmButton: false,
                timer: 3000, // 3 seconds
                customClass: {
                    title: 'swal-title', // Custom class for title
                    popup: 'swal-popup', // Custom class for the entire toast
                }
            }).then(() => {
                // Redirect after the toast is closed
                window.location.href = "index.php";
            });
              }else{
                console.log("Error", result)
                Swal.fire({   title: "ล้มเหลว",
                text: result.msg,
                icon: result.status,
                customClass: {
                confirmButton: "btn btn-primary"
                }});
              }
            }
          })
        })
      })
    </script>
  </body>
</html>