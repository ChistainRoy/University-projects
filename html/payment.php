<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted via POST method

    if (isset($_FILES['pic']) && $_FILES['pic']['error'] === UPLOAD_ERR_OK) {
        // Check if the file upload is successful
        $file = $_FILES['pic'];
        $id = $_POST['hiddenInput']; // Rename for clarity

        // Check if the uploaded file is an image
        $imageInfo = getimagesize($file['tmp_name']);
        if ($imageInfo === false) {
            // Redirect with an error message
            $errorMessage = "ไฟล์ที่อัปโหลดไม่ใช่ไฟล์รูปภาพ";
            header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
            exit();
        }

        // Database insertion code here
        include('connect.php');

        // Define the target directory for file uploads
        $targetDir = "upload/payment/";

        // Generate a unique filename to prevent overwriting
        $uniqueFileName = uniqid() . '_' . basename($file['name']);
        $targetFile = $targetDir . $uniqueFileName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            // Insert the image path and ID into the database
            $imagePath = $targetFile;
            $sql = "UPDATE `order` SET `payment` = '$imagePath' WHERE order_id = $id";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Update the status in the 'order' table
                $sqli = "UPDATE `order` SET `oder_status` = 'รอการตรวจสอบ' WHERE `order_id` = $id";
                $resultli = mysqli_query($conn, $sqli);

                if ($resultli) {
                    // Redirect with a success message
                    $successMessage = "ชำระเงินสำเร็จ กรุณารอทางร้านตรวจสอบสลิป";
                    header("Location: myorder.php?status=success&msg=" . urlencode($successMessage));
                    exit();
                } else {
                    // Redirect with an error message
                    $errorMessage = "เกิดข้อผิดพลาดในการอัปเดตสถานะในตาราง order";
                    header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
                    exit();
                }
            } else {
                // Redirect with an error message
                $errorMessage = "เกิดข้อผิดพลาดในการเพิ่มข้อมูลลงในตาราง payment";
                header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
                exit();
            }
        } else {
            // Redirect with an error message
            $errorMessage = "ไฟล์อัปโหลดไม่ถูกต้อง";
            header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
            exit();
        }
    } else {
        // Redirect with an error message
        $errorMessage = "กรุณาอัพโหลดรูปสลิปก่อนยืนยันชำระเงิน";
        header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
        exit();
    }
} else {
    // Redirect with an error message
    $errorMessage = "เกิดข้อผิดพลาดกรุณาอัพโหลดใหม่อีกครั้ง";
    header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
    exit();
}
