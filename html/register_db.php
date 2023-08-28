<?php
session_start();
include('connect.php');
if (isset($_POST['registerlogin'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $name = ($_POST['name']);
    $tel = ($_POST['tel']);
    $add = ($_POST['address']);
    $telPattern = '/^(0\d{8,9}|1\d{9})$/';
    date_default_timezone_set('Asia/Bangkok');
    $currentDate = date('Y/m/d');
    $sql = "SELECT * FROM cumtomer WHERE username = '$username'";
    $sqlem = "SELECT * FROM employee WHERE em_username = '$username'";

    $result = mysqli_query($conn, $sql);
    $resultem = mysqli_query($conn, $sqlem);

    $row = mysqli_fetch_assoc($result);
    $rowem = mysqli_fetch_assoc($resultem);

    if ($row['username'] === $username) {
        header('location: auth-register-basic.php');
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
    } elseif ($rowem['em_username'] === $username) {
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
        header('location: auth-register-basic.php');
    } else if (strlen($tel) > 10) {
        $_SESSION['errors'] = "หมายเลขโทรศัพท์ห้ามมากกว่าหรือน้อยกว่า10!!!";
        header('location: auth-register-basic.php');
    } else if (strlen($tel) < 10) {
        $_SESSION['errors'] = "หมายเลขโทรศัพท์ห้ามมากกว่าหรือน้อยกว่า10!!!";
        header('location: auth-register-basic.php');
    } else {
        $passwordect = md5($password);
        $sql = "INSERT INTO `cumtomer` (`username`, `password`, `name`, `tel`, `address`, `date_regis`) VALUES ('$username', '$passwordect', '$name', '$tel', '$add','$currentDate')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "ลงทะเบียนสำเร็จ โปรดเข้าสู่ระบบ";
        } else {
            $_SESSION['errors'] = "ลงทะเบียนไม่สำเร็จ";
        }
    }
}
mysqli_close($conn);
