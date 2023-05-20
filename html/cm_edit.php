<!-- edit user -->
<?php
include("connect.php");
session_start();

if (isset($_POST['edituser'])) {
    $iduser = $_POST['id'];
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $nameuser = $_POST['name'];
    $tel = $_POST['tel'];
    $add = $_POST['address'];
    $password = md5($pass);
    $sql = "UPDATE `cumtomer` SET `username` = '$user', `password` = '$password', `name` = '$nameuser', `tel` = '$tel', `address` = '$add' WHERE `cumtomer`.`cm_id` = $iduser";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "แก้ไขผู้ใช้สำเร็จ";
    } else {
        $_SESSION['errors'] = "แก้ไขผู้ใช้ไม่สำเร็จ";
    }
}
header('location: cm.php');
mysqli_close($conn);
?>



<!-- del user -->
<?php
include("connect.php");
session_start();

if (isset($_GET['deldata'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `cumtomer` WHERE `cumtomer`.`cm_id` = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "ลบผู้ใช้สำเร็จ";
    } else {
        $_SESSION['errors'] = "ลบผู้ใช้ไม่สำเร็จ";
    }
}
header('location: cm.php');
mysqli_close($conn);
?>




<!-- add user -->
<?php
session_start();
include('connect.php');
if (isset($_POST['adduser'])) {
    $username = $_POST['username'];
    $password = ($_POST['pass']);
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
        header('location: register.php');
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
    } elseif ($rowem['em_username'] === $username) {
        header('location: register.php');
        $_SESSION['errors'] = "ชื่อผู้ใช้ซ้ำ!!!";
    } else {
        $passwordect = md5($password);
        $sql = "INSERT INTO `cumtomer` (`username`, `password`, `name`, `tel`, `address`) VALUES ('$username', '$passwordect', '$name', '$tel', '$add')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "ลงทะเบียนสำเร็จ โปรดเข้าสู่ระบบ";
        } else {
            $_SESSION['errors'] = "ลงทะเบียนไม่สำเร็จ";
        }
        header('location: cm.php');
    }
}
mysqli_close($conn);
