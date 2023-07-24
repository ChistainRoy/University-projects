<?php
session_start();
include('connect.php');
$id = $_POST['idcm'];
$order = $_POST['idorder'];
$sql = "UPDATE `order` SET `oder_status` = 'อนุมัติ', `em_id` = '20' WHERE `order_id` = $order";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array("status" => "success", "msg" => "อนุมัติเรียบร้อย"));
}else{
    echo json_encode(array("status" => "error", "msg" => "เกิดข้อผิดพลาดในการอนุมัติ"));
}
mysqli_close($conn);