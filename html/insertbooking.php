<?php include('conn.php');
if (isset($_POST['date'])); {
    $date = $_POST['date'];
    $_SESSION['date'] =  $date;
    // $sql = "INSERT INTO `events` (`id`, `start`, `end`, `color`) VALUES (NULL, '$date', '$date', '#ff0000')";
    // if (mysqli_query($conn, $sql)) {
    //     $_SESSION['success'] = "ลงทะเบียนสำเร็จ โปรดเข้าสู่ระบบ";
    // } else {
    //     $_SESSION['errors'] = "ลงทะเบียนไม่สำเร็จ";
    // }
    header("Location: ordercconfirm.php?target=_blank", true, 302);
    exit;
}
