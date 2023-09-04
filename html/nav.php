<?php
if (!isset($_SESSION['username_user'])) {
    header("location: login.php");
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username_user']);
    header("location: login.php");
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
                    <a class="nav-link" aria-current="page" href="#">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">เกี่ยวกับร้าน</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <form class="d-flex justify-content-between" method="post" action="">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_query" />
                <button class="btn btn-outline-primary me-2" type="submit">Search</button>
            </form>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['username_user'] ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);">แก้ไขข้อมูลส่วนตัว</a></li>
                    <li><a class="dropdown-item" href="myorder.php">ออเดอร์ของฉัน</a>
                        <?php
                        echo "<span id='cart_count'></span>";
                        ?></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                </ul>
            </div>
            <a href="cartproduct.php" class="max">
                <i class="bi bi-cart-plus fs-3">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<span id='cart_count' class='num'>$count</span>";
                    } else {
                        echo "<span id='cart_count' class='num'>0</span>";
                    } ?>
                </i>
            </a>

        </div>
    </div>
    </div>
</nav>