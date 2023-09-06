<?php
session_start();
if (isset($_POST['orderId'])) {
    include('connect.php');
    $orderId = $_POST['orderId'];
    $dateOperate = $_POST['dateOperate'];
    $sql = "UPDATE performance
    SET status_performance = 'ดำเนินการเสร็จสิ้น'
    WHERE order_id = $orderId
    ORDER BY performance_id DESC
    LIMIT 1";
    if (mysqli_query($conn, $sql)) {
        $response = array("status" => "success", "msg" => "บันทึกข้อมูลเรียบร้อย");
    } else {
        $response = array("status" => "erroe", "msg" => "เกิดข้อผิดพลาดในการบันทึกข้อมูล");
    }
    echo json_encode($response);
    mysqli_close($conn);
} else {
    $response = array("status" => "error", "msg" => "ไม่มีการส่งข้อมูลเข้ามา");
    echo json_encode($response);
}
