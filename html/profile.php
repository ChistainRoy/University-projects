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
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap');

    .navbar {
        background-color: #ffffff;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    a.navbar-brand {
        color: white;
    }

    span {
        font-family: 'Sarabun', sans-serif;
    }

    span.uppercase {

        text-transform: uppercase;
    }

    h5 {
        font-family: 'Sarabun', sans-serif;
    }
</style>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username_user'])) {
        header("location: auth-login-basic.php");
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username_user']);
        header("location: auth-login-basic.php");
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
                        <a class="nav-link" aria-current="page" href="javascript:void(0)">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">เกี่ยวกับร้าน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            สินค้า
                        </a>
                        <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="allproduct.php">สินค้าทั้งหมด</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0)">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="../assets/img/avatars/admin.jpg" alt class="w-px-30 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <label class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 text-center">
                                            <span class="fw-semibold uppercase"> <?php echo $_SESSION['username_user'] ?></span>
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-account-settings-account.html">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">แก้ไขโปรไฟล์</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">รายการสินค้า</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">ออกจากระบบ</span>
                                </a>
                            </li>
                        </ul>
                </ul>
                </li>
            </div>
        </div>
    </nav>
    <section>
        <div class="container p-4 mt-5">
            <div class="card mb-4">
                <h5 class="card-header">แก้ไขโปรไฟล์</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="../assets/img/avatars/admin.jpg" alt="user-avatar" class="d-block rounded" height="100" width="100" id="preview" />
                        <div class="button-wrapper">
                            <label for="formFile" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">อัพโหลดรูปภาพ</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="formFile" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">ยกเลิกรูปภาพ</span>
                            </button>

                            <p class="text-muted mb-0">ขนาดไฟล์สูงสุด 800KB</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-2 p-3">
                    <div class="col-6 ">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" id="username" class="form-control" name="username" value="" required />
                    </div>
                    <div class="col-6 ">
                        <label for="username" class="form-label">รหัสผ่าน</label>
                        <input type="text" id="username" class="form-control" name="username" value="" required />
                    </div>
                    <div class="col-8">
                        <label for="username" class="form-label">ชื่อจริง-นามสุกล</label>
                        <input type="text" id="username" class="form-control" name="username" value="" required />
                    </div>
                    <div class="col-4">
                        <label for="username" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text" id="username" class="form-control" name="username" value="" required />
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <textarea class="form-control" name="address" rows="3" required></textarea><br>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        const input = document.getElementById('formFile');
        const preview = document.getElementById('preview');

        input.addEventListener('change', () => {
            const file = input.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                preview.src = reader.result;
            });

            reader.readAsDataURL(file);
        });
    </script>
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