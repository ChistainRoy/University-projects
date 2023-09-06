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
                        <a class="nav-link" href="contact.php">เกี่ยวกับร้าน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="allproduct.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username_user'] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a></li>
                        <li><a class="dropdown-item" href="myorder.php">ออเดอร์ของฉัน&nbsp;&nbsp;<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $numorder ?></span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <?php
        include('connect.php');
        $id = $_SESSION['id_cm'];
        echo $id;
        $sql = "SELECT * FROM `cumtomer` WHERE `cm_id` = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['username'];
        $password = $row['password'];
        $name_user = $row['name'];
        $tel = $row['tel'];
        $address = $row['address'];
        ?>

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register Card -->
                    <div class="col-xl-12">
                        <div class="card mt-4">
                            <div class="card-header d-flex justify-content-center align-items-center">
                                <img src="upload/b.png" width="50">
                                <h5 class="mb-0">แก้ไขข้อมูลส่วนตัว</h5>
                            </div>
                            <div class="card-body">
                                <form action="profile_db.php" method="post">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">ชื่อผู้ใช้</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="John" aria-label="John" aria-describedby="basic-icon-default-fullname2" name="username" value="<?php echo $name ?>" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-company">รหัสผ่าน</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bxs-key'></i></span>
                                            <input type="password" id="basic-icon-default-company" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" name="password" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-email">ชื่อจริง-นามสกุล (เว้นวรรค)</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class='bx bx-notepad'></i></span>
                                            <input type="text" id="basic-icon-default-email" class="form-control" placeholder="john doe" aria-label="john doe" aria-describedby="basic-icon-default-email2" name="name" value="<?php echo $name_user ?>" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-phone">เบอร์โทรศัพท์</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                            <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" name="tel" value="<?php echo $tel ?>" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-message">ที่อยู่</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                            <textarea id="basic-icon-default-message" class="form-control" placeholder="address" aria-label="address" aria-describedby="basic-icon-default-message2" name="address" required><?php echo $address ?></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="fix">แก้ไขข้อมูลส่วนตัว</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Register Card -->
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: '<?php echo $_SESSION['success']; ?>',
            });
        </script>
    <?php unset($_SESSION['success']);
    endif; ?>
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