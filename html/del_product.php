<?php
include("connect.php");
session_start();

if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $sqli = "SELECT * FROM `oderdetail` WHERE `oderdetail`.`product_id` = $id;";
    $row = mysqli_query($conn, $sqli);
    if (mysqli_num_rows($row) >= 1) {
        $_SESSION['errors'] = "ไม่สามารถลบสินค้าตัวนี้ได้";
    } else {
        $sql = "DELETE FROM product WHERE product_id = '$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "ลบสินค้าสำเร็จ";
        } else {
            $_SESSION['errors'] = "ลบสินค้าไม่สำเร็จ";
        }
    }
}
header('location: product.php');
mysqli_close($conn);
