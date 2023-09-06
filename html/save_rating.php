<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include('connect.php');

    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $id = $_POST["id"];
    $currentDate = date('Y-m-d H:i:s');
    // Process your database update here
    // Example: Insert the rating and comment into a ratings table
    $sql = "INSERT INTO comment (order_id, comment_img, comment_detail,comment_date) VALUES ('$id','$rating', '$comment','$currentDate')";

    if ($conn->query($sql) === TRUE) {
        $response = array("status" => "success", "message" => "บันทึกข้อมูลเรียบร้อย ขอขอบคุณที่ใช้บริการเราครับ");
    } else {
        $response = array("status" => "error", "message" => "บันทึกข้อมูลผิดพลาด กรุณาบันทึกใหม่");
    }

    echo json_encode($response);
    $conn->close();
}
