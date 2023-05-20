<!-- add cat db -->
<?php
session_start();
include('connect.php');
if (isset($_POST['addcat'])) {
    $name = $_POST['namecat'];

    $sql = "SELECT * FROM category WHERE cat_name = '$name'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if ($row['cat_name'] === $name) {
        header('location: category.php');
        $_SESSION['errors'] = "ชื่อประเภทสินค้าซ้ำ!!!";
    } else {
        $sql = "INSERT INTO `category` (`cat_name`) VALUES ('$name')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
        } else {
            $_SESSION['errors'] = "เพิ่มข้อมูลไม่สำเร็จ";
        }
        header('location: category.php');
        mysqli_close($conn);
    }
} ?>

<!-- edit cat -->
<?php
include("connect.php");
session_start();
$sql = "SELECT * FROM category WHERE cat_name = '$name'";
if (isset($_POST['editcat'])) {


    $id = $_POST['idcat'];
    $name = $_POST['namecat'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);



    $sql = "UPDATE `category` SET `cat_name` = '$name' WHERE `category`.`id_cat` = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "แก้ไขผู้ใช้สำเร็จ";
    } else {
        $_SESSION['errors'] = "แก้ไขผู้ใช้ไม่สำเร็จ";
    }
}
header('location: category.php');
mysqli_close($conn);
?>