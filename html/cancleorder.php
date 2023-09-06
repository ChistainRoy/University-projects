<?php
session_start();
if (isset($_GET['idd'])) {
    include('connect.php');
    $id = $_GET['idd'];
    $sql = "DELETE FROM `order` WHERE order_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql_table2 = "DELETE FROM `oderdetail` WHERE `oder_id`  = $id";
        $result_table2 = mysqli_query($conn, $sql_table2);
        if ($result_table2) {
            $sql_table3 = "DELETE FROM `events` WHERE `order_id`  = $id";
            $result_table3 = mysqli_query($conn, $sql_table3);
            if ($result_table3) {
                $_SESSION['errors'] = "ยกเลิกคำสั่งซื้อเสร็จสิ้น";
                header('location: myorder.php');
            } else {
                $_SESSION['errors'] = "ยกเลิกคำสั่งซื้อไม่สำเร็จ";
                header('location: myorder.php');
            }
        } else {
            $_SESSION['errors'] = "ยกเลิกคำสั่งซื้อไม่สำเร็จ";
            header('location: myorder.php');
        }
    } else {
        $_SESSION['errors'] = "ยกเลิกคำสั่งซื้อไม่สำเร็จ";
        header('location: myorder.php');
    }
}
