<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Order - Detail | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme_user.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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

<<<<<<< HEAD h5 {
    font-family: 'Sarabun', sans-serif;
}

h3 {
    color: #ffff;
}

h2 {
    color: #696cff;
}

body {
    background: -webkit-linear-gradient(left, #e0e0e0, #696cff);
}

.card-header {
    background: #696cff;
}

.img {
    margin: auto auto;
}

.preview {
    margin: auto auto;
}

h5 {
    font-family: 'Sarabun', sans-serif;
}

h3 {
    color: #ffff;
}

h2 {
    color: #696cff;
}

body {
    background: -webkit-linear-gradient(left, #e0e0e0, #696cff);
}

.card-header {
    background: #696cff;
}

.img {
    margin: auto auto;
}

.preview {
    margin: auto auto;
}
</style>

<body>
    <section>
        <!-- modal detail -->
        <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalScrollableTitle">รายละเอียดคำสั่งซื้อ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="modal-body">
                        <?php
                                session_start();
                 include('connect.php');
                if(isset($_GET['ids'])){
                        $id = $_GET['ids'];
                        $sql = "SELECT * FROM `order` INNER JOIN oderdetail ON `order`.`order_id` = oderdetail.oder_id
                        INNER JOIN product ON oderdetail.product_id = product.product_id WHERE `order_id` = $id";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="<?php echo $row['product_img'] ?>" alt="user-avatar" class="d-block rounded"
                                    height="150" width="120" />
                                <p><?php echo $row['product_name'] ?><br>ขนาด
                                    <?php echo $row['product_width'] ?> X
                                    <?php echo $row['product_length'] ?></p>
                                <h5 class="mx-5">ราคา</h5>
                                <h5><?php echo $row['product_price'] ?></h5>
                                <h5>X</h5>
                                <h5><?php echo $row['oder_qty'] ?></h5>
                                <?php $address = $row['order_address'] ?>
                                <?php $total = $row['oder_total'] ?>
                                <?php $price = $total * 20 / 100 
                                        ?>
                            </div>

                        </div>
                        <hr>

                        <?php   } 
            ?>
                        <?php
            }
            ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            ปิด
                        </button>
                        <button type="button" class="btn btn-primary">ชำระเงิน</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal detail -->
        <div class="container p-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-xl-4">
                    <div class="card">
                        <h3 class="card-header text-center mb-3">ชำระเงิน</h3>
                        <img src="upload/scan.png" alt class="img d-block rounded p-2" height="200" width="200" />
                        <div class="card-body p-3">
                            <h2 class="text-center">฿ <?php echo $price?></h2>
                            <p class="text-center">ร้าน บัดดี้อลูมิเนียม-กระจก</p>
                            <p class="text-center">Buddy Aluminum-glass</p>
                            <label for="formFile" class="form-label">กดปุ่มอัปโหลดสลิป</label>
                            <div class="input-group">
                                <input class="form-control" type="file" id="formFile" name="pic" />
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                            <br>
                            <button class="btn btn-primary">ยืนยันชำระเงิน</button>
                        </div>
                    </div>
                </div>
                <!-- modal slip -->
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">รูปที่อัพโหลด</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <div class="d-flex align-items-center align-items-sm-center gap-4">
                                    <img src="" id="preview" width="200" class="preview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal slip -->
                <div class="col-xl-4">
                    <div class="card">
                        <h3 class="card-header text-center mb-3">สรุปยอดคำสั่งซื้อ</h3>
                        <div class="card-body p-3">
                            <p>ชื่อผู้สั่งซื้อ</p>
                            <h5 class="mx-2"><?php echo $_SESSION['fullname'] ?></h5>
                            <p>ที่อยู่จัดส่ง</p>
                            <h5 class="mx-2"><?php echo $address ?></h5>
                            <p>ราคาทั้งหมด</p>
                            <h5 class="mx-2"><?php echo $total ?></h5>
                            <p>ราคามัดจำที่ต้องจ่าย (20%)</p>
                            <h5 class="mx-2"><?php echo $price ?></h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalScrollable">
                                รายละเอียดคำสั่งซื้อ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
    const input = document.getElementById('formFile');
    const preview = document.getElementById('preview');
    const defaultImageSrc = 'upload/ขอภัย.png';

    // Set the default image
    preview.src = defaultImageSrc;

    input.addEventListener('change', () => {
        const file = input.files[0];
        const reader = new FileReader();

        reader.addEventListener('load', () => {
            if (file) {
                // If the input has a file selected, display the image preview
                preview.src = reader.result;
            } else {
                // If no file is selected, display the default image
                preview.src = defaultImageSrc;
            }
        });

        if (file) {
            reader.readAsDataURL(file);
        }
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