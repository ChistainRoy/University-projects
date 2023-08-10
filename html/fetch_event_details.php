<?php
include('connect.php');
// fetch_event_details.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['eventId'];
    $sql = "SELECT * FROM `order` WHERE `order_id` = $eventId";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $orderTotal = $row['oder_total'];
    }
    $eventDetails = array();
    $eventDetails['eventName'] = "ชื่อเหตุการณ์ตาม eventId: " . $eventId;
    $eventDetails['orderTotal'] = $orderTotal;
    $eventDetails['otherData'] = "ข้อมูลเพิ่มเติมตาม eventId: " . $eventId;
    echo json_encode($eventDetails);
} else {
    // Return error response
    echo json_encode(array("error" => "Invalid request"));
}
