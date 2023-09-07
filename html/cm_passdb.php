<?php
session_start();
include('connect.php');
$id_admin = $_SESSION['id_em'];
$id = $_POST['idcm'];
$order = $_POST['idorder'];
$date = $_POST['date'];

// ทำการอัปเดตสถานะในตาราง order
$sql = "UPDATE `order` SET `oder_status` = 'ชำระเงินแล้ว', `em_id` = '$id_admin' WHERE `order_id` = $order";

if (mysqli_query($conn, $sql)) {
    // เมื่ออัปเดตสถานะในตาราง order เสร็จสิ้น

    // ทำการเพิ่มข้อมูลในตารางอื่นๆ
    $sql2 = "INSERT INTO `performance` (`order_id`, `date_ operate`,`status_performance`) VALUES ('$order', '$date','รอตรวจสอบสถานที่ติดตั้ง')"; // เปลี่ยนชื่อตารางและคอลัมน์ตามที่ต้องการ

    if (mysqli_query($conn, $sql2)) {
        // เมื่อเพิ่มข้อมูลในตารางอื่นๆ เสร็จสิ้น
        echo json_encode(array("status" => "success", "msg" => "อนุมัติเรียบร้อยและเพิ่มข้อมูลในตารางสถานะคำสั่งซื้อเรียบร้อย"));
    } else {
        // เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตารางอื่นๆ
        echo json_encode(array("status" => "error", "msg" => "เกิดข้อผิดพลาดในการเพิ่มข้อมูลในตารางอื่นๆ"));
    }
} else {
    // เกิดข้อผิดพลาดในการอัปเดตสถานะในตาราง order
    echo json_encode(array("status" => "error", "msg" => "เกิดข้อผิดพลาดในการอนุมัติ"));
}

mysqli_close($conn);
