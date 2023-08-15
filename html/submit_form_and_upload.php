<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ตรวจสอบว่ามีข้อมูลที่ต้องการรับมา
    if (isset($_POST['id']) && isset($_POST['date']) && isset($_POST['detail'])) {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $detail = $_POST['detail'];
        $flexRadioDefault = $_POST['flexRadioDefault'];
        $currentDate = date('Y-m-d');
        if (strtotime($date) <= strtotime($currentDate)) {
            echo json_encode(array("status" => "error", "msg" => "ไม่สามารจองวันที่ผ่านมาแล้วหรือวันปัจจุบันได้"));
            exit;
        }
        // ตรวจสอบว่ามีการอัปโหลดไฟล์รูปภาพ
        if (isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['imageFile'];
            $targetDir = "upload/operate/";
            $targetFile = $targetDir . basename($file['name']);

            // อัปโหลดไฟล์รูปภาพ
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $imagePath = $targetFile;
            } else {
                echo json_encode(array("status" => "error", "msg" => "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ"));
                exit;
            }
        } else {
            $imagePath = null; // ไม่มีการอัปโหลดรูปภาพ
        }

        // เชื่อมต่อฐานข้อมูล
        include('connect.php');

        // บันทึกข้อมูลลงฐานข้อมูล
        $sql = "INSERT INTO `performance` (`order_id`, `performance_id`, `date_ operate`, `detail_ correction`, `img_correction`, `status_performance`) VALUES ('$id', NULL, '$date', '$detail', '$imagePath', '$flexRadioDefault')";
        $result = mysqli_query($conn, $sql);
        $sql_other_table = "INSERT INTO `events` (`id`, `start`, `end`, `color`) VALUES (NULL, '$date', '$date', '#696cff')";
        $result_other_table = mysqli_query($conn, $sql_other_table);

        if ($result && $result_other_table) {
            echo json_encode(array("status" => "success", "msg" => "บันทึกข้อมูลสำเร็จ"));
        } else {
            echo json_encode(array("status" => "error", "msg" => "เกิดข้อผิดพลาดในการบันทึกข้อมูล"));
        }
    } else {
        echo json_encode(array("status" => "error", "msg" => "ข้อมูลไม่ครบถ้วน"));
    }
} else {
    echo json_encode(array("status" => "error", "msg" => "ไม่สามารถรับคำขอแบบนี้ได้"));
}
