<?php
session_start();
include('connect.php');
if (isset($_POST['submitlogin'])) {
    $username = $_POST['username'];
    $passwod_em = $_POST['password'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM employee WHERE em_username = '$username' AND em_password = '$passwod_em'";
    $sqluser = "SELECT * FROM cumtomer WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);
    $resultuser = mysqli_query($conn, $sqluser);

    if (mysqli_num_rows($resultuser) == 1) {
        $_SESSION['username_user'] = $username;
        echo "user";
        header('location: index_user.php');
    } elseif (mysqli_num_rows($result) == 1) {
        $_SESSION['username_admin'] = $username;
        header('location: index.php');
        echo "admin";
    } else {
        $_SESSION['errors'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!!!";
        echo "<script>alert('Username exists');</script>";
        header('location: login.php');
    }
}
mysqli_close($conn);
