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
        $response = array("status" => "success", "msg" => "Database updated successfully");
    } else {
        $response = array("status" => "erroe", "msg" => "Invalid request");
    }
    echo json_encode($response);
    mysqli_close($conn);
} else {
    $response = array("status" => "error", "msg" => "Invalid request");
    echo json_encode($response);
}
