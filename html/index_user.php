<?php
session_start();
if (!isset($_SESSION['username_user'])) {
    header("location: login.php");
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username_user']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Home - Page | Buddy-Aluminum</title>

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
    <!-- <script src="../assets/vendor/js/helpers.js"></script> -->

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <!-- <script src="../assets/js/config.js"></script> -->
</head>
<style>
    .navbar {
        background-color: #ffffff;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    a.navbar-brand {
        color: white;
    }

    .num {
        font-family: 'Sigmar', cursive;
        background-color: red;
        position: absolute;
        color: white;
        font-size: 14px;
        margin-left: 150px;
        margin-bottom: 50px;
        margin-top: -37px;
        width: 30px;
        text-align: center;
        padding: 4px;
        border-radius: 20px;
    }


    .carousel-item {
        width: 100%;
        height: 700px;
    }

    .slide {
        width: 100%;
        height: 700px;
    }

    .card-img-top {
        width: 100%;
        height: 400px;
    }

    @media (max-width:767px) {
        .slide {
            max-width: 100%;
            height: 200px;
        }
    }

    @media (max-width:767px) {
        .carousel-item {
            max-width: 100%;
            height: 200px;
        }
    }

    .dropdown:hover>.dropdown-menu,
    .dropend:hover>.dropdown-menu {
        display: block;
        margin-top: .125em;
        margin-left: .125em;
    }

    @media screen and (min-width:769px) {
        .dropend:hover>.dropdown-menu {
            position: absolute;
            top: 0;
            left: 100%;
        }
    }

    .about {
        font-size: 80px;
    }

    .icon-large {
        font-size: 48px;
        color: white;
    }

    .icon-lar {
        font-size: 28px;
    }

    .detail {
        font-size: 20px;
    }

    .bg2 {
        background-color: #696cff;
    }

    .detail2 {
        color: white;
    }

    .star {
        font-size: 30px;
    }

    .star.active {
        color: gold;
    }

    /* Initially hide additional products */
    .hidden-product {
        display: none;
    }

    /* Add animation effect when showing additional products */
    .show-product {
        display: block;
        margin-top: 30px;
        animation: fadeIn 1s;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .fix {
        width: 100%;
        /* กำหนดความกว้างของรูปภาพให้เต็มความกว้างของบรรจุรูปภาพ */
        height: 660px;
        /* กำหนดความสูงที่คุณต้องการ */
        object-fit: cover;
        /* ให้รูปภาพปรับขนาดเพื่อครอบคลุมพื้นที่ในกรอบ */
        object-position: center;
        /* กำหนดตำแหน่งรูปภาพในกรอบ (center, top, bottom, left, right, เป็นต้น) */
    }
</style>
<?php
include('connect.php');
$user = $_SESSION['username_user'];
$sql = "SELECT cm_id,name FROM cumtomer WHERE username = '$user'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($query)) {
        $numberuser = $row['cm_id'];
        $_SESSION['fullname'] = $row['name'];
    }
} else {
    //   echo "0 results";
}
$sql = "SELECT COUNT(cm_id) AS test FROM `order` WHERE cm_id = $numberuser";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    // echo $row['test'];
    $numorder = $row['test'];
}
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <img src="upload/b.png" width="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="javascript:void(0)">หน้าหลัก</a>
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
                        <li><a class="dropdown-item" href="javascript:void(0);">แก้ไขข้อมูลส่วนตัว</a></li>
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
        <?php include('connect.php');
        $sql = "SELECT * FROM `shop`";
        $success = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($success);
        ?>
        <div class="container-fluid p-0">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <ol class="img carousel-indicators">
                    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="slide" src="<?php echo $row['img_1'] ?>" alt="First slide" />
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="slide" src="<?php echo $row['img_2'] ?>" alt="Second slide" />
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="slide" src="<?php echo $row['img_3'] ?>" alt="Third slide" />
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- สิ้นสุด Hero Section -->

    <!-- เริ่มต้น Features Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>ยินดีต้อนรับ</h2>
                    <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.
                        Praesent libero.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="upload/2.png" alt="Product Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img class="fix" src="upload/IMG_5727.jpg" alt="Product Image">
                </div>
                <div class="col-lg-6">
                    <h2>หลักฐานดำเนินกิจการ</h2>
                    <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.
                        Praesent libero.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- สิ้นสุด Hero Section -->

    <!-- เริ่มต้น Features Section -->
    <section class="py-5 bg2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <i class='bx bx-cart icon-large'></i>
                        <h5 class="card-title mt-4 detail2">สั่งซื้อง่าย</h5>
                        <p class="card-text detail2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class='bx bxs-calendar icon-large'></i>
                        <h5 class="card-title mt-4 detail2">จองสบาย</h5>
                        <p class="card-text detail2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class='bx bxs-cog icon-large''></i>
                            <h5 class="card-title mt-4 detail2">ติดตั้งรวดเร็ว</h5>
                            <p class="card-text detail2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>

        </div>

        
    </section>
    <section class="bg-white text-white py-5">
    <div class="container mt-5">
        <h2 class="text-center">สินค้าภายในร้าน</h2>
        <?php
        $product = array();
        $sql = "SELECT * FROM product
        LIMIT 6;";
        $product_data = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($product_data)) {
            $product[] = $row;
        } ?>
        <div class="row" id="productRow">
            <!-- Product 1 -->  
            <?php foreach ($product as $index => $product_data) { ?>
        <div class="col-md-4 <?php echo ($index >= 3) ? 'hidden-product' : ''; ?>">
            <div class="card">
                <img class="card-img-top" src="<?php echo $product_data['product_img']; ?>" alt="Card image cap" />
                <div class="card-body">
                    <h3 class="card-title"><?php echo $product_data['product_name']; ?> ขนาด <?php echo $product_data['product_width']; ?> X <?php echo $product_data['product_length']; ?></h3>
                    <h4 class="card-text p-0">สีกระจก &nbsp; <?php
                                                                if ($product_data['colorglass'] === "1") {
                                                                    $color = "เขียว";
                                                                    echo $color;
                                                                } else if ($product_data['colorglass'] === "2") {
                                                                    echo $color = "ดำ";
                                                                } else if ($product_data['colorglass'] === "3")
                                                                    echo $color = "กันยูวี";
                                                                ?></h4>
                                                        <h4 class="card-text p-0">สีกรอบ &nbsp; &nbsp;
                                                        <?php if ($product_data['colorframe'] === "1") {
                                                            $frame = "ชา";
                                                            echo $frame;
                                                        } elseif ($product_data['colorframe'] === "2") {
                                                            $frame = "นม";
                                                            echo $frame;
                                                        } elseif ($product_data['colorframe'] === "3") {
                                                            $frame = "ดำ";
                                                            echo $frame;
                                                        } else if ($product_data['colorframe'] === "4") {
                                                            $frame = "ไม้";
                                                            echo $frame;
                                                        } else
                                                        ?>

                                                        </h4>
                    <h2 class="card-text text-center p-0"><?php
                                                        $formatted_price = number_format($product_data['product_price'], 0);
                                                        echo $formatted_price ?> ฿</h2>
                </div>
            </div>
        </div>
    <?php } ?>
        <div class="d-flex justify-content-center mt-5">
            <button class="btn btn-primary btn-lg" id="showMoreBtn">สินค้าเพิ่มเติม<i class=' bx bxs-chevron-down'></i></button>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="allproduct.php" class="btn btn-primary btn-lg hidden-product">สินค้าทั้งหมด<i class=' bx bxs-chevron-down'></i></a>
                    </div>
                </div>
    </section>

    <!-- สิ้นสุด Features Section -->


    <!-- เริ่มต้น Contact Section -->
    <section class="bg-primary text-white py-5">
        <div class="container mt-2">
            <h2 class="text-white mb-5">ความคิดเห็นจากผู้ที่ใช้บริการล่าสุด</h2>

            <!-- แสดงความคิดเห็นที่โพสต์แล้ว -->
            <?php
            $comment = array();
            $sql = "SELECT  comment.comment_detail,comment.comment_img,comment.comment_date,`order`.`cm_id`,cumtomer.name
            FROM comment
            INNER JOIN `order` ON comment.order_id = `order`.`order_id`
            INNER JOIN cumtomer ON `order`.`cm_id` = cumtomer.cm_id
                        ORDER BY comment_date DESC
                        LIMIT 2;";
            $comment = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($comment)) {
                $comment_data[] = $row;
            } ?>
            <?php foreach ($comment_data as $comment) { ?>
                <div class="comment mt-2">
                    <h3 class="text-white mt-3"><?php echo $comment['name']; ?></h3>
                    <?php
                    $date = $comment['comment_date'];
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
                    $timestamp = strtotime($date);
                    $buddhistYear = date("Y", $timestamp) + 543;
                    $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                    $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                    $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear;

                    ?>
                    <p><?php echo $thaiFormattedDate; ?></p>
                    <p><?php echo $comment['comment_detail']; ?></p>
                    <div class="rating">
                        <!-- ตรวจสอบและแสดงจำนวนดาวตามคะแนน -->
                        <?php for ($i = 1; $i <= 4; $i++) { ?>
                            <?php $class = ($i <= $comment['comment_img']) ? 'active' : ''; ?>
                            <span class="star <?php echo $class; ?>">&#9733;</span>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- สิ้นสุด Contact Section -->

    <!-- เริ่มต้น Contact Section -->
    <section class="bg-white text-white py-5">
        <div class="container">
            <h3>ติดต่อเรา <i class='bx bxs-phone-call icon-lar'></i></h3>
            <h4>กรณีต้องการเดินทางมาสั่งที่ร้านโดยตรง</h4>
            <a href="contact.php" class="btn btn-primary">ติดต่อตอนนี้</a>
        </div>
    </section>
    <!-- สิ้นสุด Contact Section -->

    <!-- เริ่มต้น Footer Section -->
    <footer class="bg-dark text-white text-center py-3">
        <div id="fb-root"></div>

        <!-- Your ปลั๊กอินแชท code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "111148158757225");
            chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v17.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        &copy; 2023 บัดดี้อลูมิเนียม-กระจก
    </footer>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showMoreBtn = document.getElementById('showMoreBtn');
            const hiddenProducts = document.querySelectorAll('.hidden-product');

            showMoreBtn.addEventListener('click', function() {
                hiddenProducts.forEach(function(product) {
                    product.classList.add('show-product');
                });
                showMoreBtn.style.display = 'none'; // ซ่อนปุ่ม "สินค้าทั้งหมด" เมื่อแสดงสินค้าเพิ่มเติม
            });
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
    <!-- Messenger ปลั๊กอินแชท Code -->
</body>

</html>