<?php
session_start();
include('connect.php');
if (isset($_POST['registerlogin'])) {
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

    if ($row['username'] === $username) {
        header('location: auth-login-basic.php');
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
    } elseif ($rowem['em_username'] === $username) {
        header('location: auth-login-basic.php');
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
    } else {
        $passwordect = md5($password);
        $sql = "INSERT INTO `cumtomer` (`username`, `password`, `name`, `tel`, `address`) VALUES ('$username', '$passwordect', '$name', '$tel', '$add')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "ลงทะเบียนสำเร็จ โปรดเข้าสู่ระบบ";
        } else {
            $_SESSION['errors'] = "ลงทะเบียนไม่สำเร็จ";
        }
        header('location: auth-login-basic.php');
    }
}
mysqli_close($conn);
