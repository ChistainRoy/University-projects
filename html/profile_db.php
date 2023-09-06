<?php
session_start();
include('connect.php');
if (isset($_POST['fix'])) {
    $id = $_SESSION['id_cm'];
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $name = ($_POST['name']);
    $tel = ($_POST['tel']);
    $add = ($_POST['address']);
    $sql = "SELECT * FROM cumtomer WHERE username = '$username'";
    $sqlem = "SELECT * FROM employee WHERE em_username = '$username'";

    $result = mysqli_query($conn, $sql);
    $resultem = mysqli_query($conn, $sqlem);

    $row = mysqli_fetch_assoc($result);
    $rowem = mysqli_fetch_assoc($resultem);

    if ($row > 1) {
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
        header('location: profile.php');
    } elseif ($rowem > 1) {
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
        header('location: profile.php');
    } else if (strlen($tel) > 10) {
        $_SESSION['errors'] = "หมายเลขโทรศัพท์ต้องมี 10 หลัก!!!";
        header('location: profile.php');
    } else if (strlen($tel) < 10) {
        $_SESSION['errors'] = "หมายเลขโทรศัพท์ต้องมี 10 หลัก!!!";
        header('location: profile.php');
    } else {
        $passwordect = md5($password);
        $sql = "UPDATE `cumtomer`
        SET
            `username` = '$username',
            `password` = '$passwordect',
            `name` = '$name',
            `tel` = '$tel',
            `address` = '$add'
        WHERE
            `cm_id` = '$id';
        ";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "แก้ไขข้อมูลส่วนตัวแล้ว";
            header('location: profile.php');
        } else {
            $_SESSION['errors'] = "แก้ไขข้อมูลส่วนตัวผิดพลาด";
            header('location: profile.php');
        }
    }
}
mysqli_close($conn);
