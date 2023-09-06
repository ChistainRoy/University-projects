<?php
session_start();
include('connect.php');
$username = $_POST['username'];
$passwod_em = $_POST['password'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM employee WHERE em_username = '$username' AND em_password = '$passwod_em'";
$sqluser = "SELECT * FROM cumtomer WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);
$resultuser = mysqli_query($conn, $sqluser);

if (!$username) {
    echo json_encode(array("status" => "error", "msg" => "กรุณากรอกให้ครบถ้วน"));
} else if (!$passwod_em) {
    echo json_encode(array("status" => "error", "msg" => "กรุณากรอกให้ครบถ้วน"));
} else if (mysqli_num_rows($resultuser) == 1) {
    $row = mysqli_fetch_assoc($resultuser);
    $_SESSION['id_cm'] = $row['cm_id'];
    $_SESSION['username_user'] = $username;
    echo json_encode(array("status" => "success", "msg" => "เข้าสู่ระบบสำเร็จ"));
    // header('location: index_user.php');
} else if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id_em'] = $row['em_id'];
    $_SESSION['username_admin'] = $username;
    echo json_encode(array("status" => "info", "msg" => "เข้าสู่ระบบสำเร็จ"));
    // header('location: index.php');
} else {
    echo json_encode(array("status" => "error", "msg" => "ชื่อหรือรหัสผ่านไม่ถูกต้อง"));
}
mysqli_close($conn);
