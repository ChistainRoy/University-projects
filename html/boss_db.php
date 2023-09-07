<?php
session_start();
include('connect.php');
$username = $_POST['username'];
$passwod_em = $_POST['password'];

if (!$username) {
    $_SESSION['errors_boss'] = "กรุณากรอกให้ครบถ้วน";
} else if (!$passwod_em) {
    $_SESSION['errors_boss'] = "กรุณากรอกให้ครบถ้วน";
} else if ($username == 'boss' && $passwod_em == '012716156') {
    $_SESSION['boss'] = $row['em_id'];
    $_SESSION['username_admin'] = $username;
    $_SESSION['success_boss'] = "เข้าสู่ระบบสำเร็จ";
} else {
    $_SESSION['errors_boss'] = "ชื่อหรือรหัสผ่านไม่ถูกต้อง";
}
header('location: login_boss.php');

mysqli_close($conn);
