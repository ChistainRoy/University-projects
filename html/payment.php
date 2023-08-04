<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted via POST method

    if (isset($_FILES['pic']) && $_FILES['pic']['error'] === UPLOAD_ERR_OK) {
        // Check if the file upload is successful
        $file = $_FILES['pic'];

        // Get the value of the hidden input field
        $id = $_POST['hiddenInput'];

        // Database insertion code here
        // Connect to your database and perform the necessary INSERT operation
        include('connect.php');

        // Example: Insert the image file and associated ID into a 'payment' table
        $targetDir = "upload/payment/";
        $targetFile = $targetDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            // Insert the image path and ID into the database
            $imagePath = $targetFile;

            // Perform the database INSERT operation
            $sql = "UPDATE `order` SET `payment` = '$imagePath' WHERE order_id = $id";
            $result = mysqli_query($conn, $sql);

            // Check if the INSERT operation is successful
            if ($result) {
                // Update the status in the 'order' table
                $sqli = "UPDATE `order` SET `oder_status` = 'รอการตรวจสอบ' WHERE `order_id` = $id";
                $resultli = mysqli_query($conn, $sqli);

                // Check if the UPDATE operation is successful
                if ($resultli) {
                    // Return a response indicating success and redirect
                    $successMessage = "ชำระเงินสำเร็จ กรุณารอทางร้านตรวจสอบสลิป";
                    header("Location: myorder.php?status=success&msg=" . urlencode($successMessage));
                    exit();
                } else {
                    // Return a response indicating an error if the UPDATE operation fails
                    $errorMessage = "เกิดข้อผิดพลาดในการอัปเดตสถานะในตาราง order";
                    header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
                    exit();
                }
            } else {
                // Return a response indicating an error if the INSERT operation fails
                $errorMessage = "เกิดข้อผิดพลาดในการเพิ่มข้อมูลลงในตาราง payment";
                header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
                exit();
            }
        } else {
            // Return a response indicating an error if there's an issue with moving the uploaded file
            $errorMessage = "ไฟล์อัปโหลดไม่ถูกต้อง";
            header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
            exit();
        }
    } else {
        // Return a response indicating an error if the file upload is not successful
        $errorMessage = "กรุณาอัพโหลดรูปสลิปก่อนยืนยันชำระเงิน";
        header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
        exit();
    }
} else {
    // Return a response indicating an error if the form is not submitted via POST method
    $errorMessage = "เกิดข้อผิดพลาดกรุณาอัพโหลดใหม่อีกครั้ง";
    header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
    exit();
}
