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

        // Example: Insert the image file and associated ID into a 'payment' table
        $targetDir = "upload/payment/";
        $targetFile = $targetDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            // Insert the image path and ID into the database
            $imagePath = $targetFile;

            // Perform the database INSERT operation
            include('connect.php');
            $sql = "INSERT INTO payment (oder_id, pay_img) VALUES ('$id', '$imagePath')";
            $result = $conn->query($sql);

            // Return a response indicating success
            $response = array(
                "status" => "success",
                "msg" => "ชำระเงินสำเร็จกรุณารอทางร้านตรวจสอบสลิป"
            );
            $successMessage = "ชำระเงินสำเร็จกรุณารอทางร้านตรวจสอบสลิป";
                header("Location: myorder.php?status=success&msg=" . urlencode($successMessage));
                exit();
        } else {
            // Return a response indicating an error if there's an issue with moving the uploaded file
            $response = array(
                "status" => "error",
                "msg" => "ไฟล์อัปโหลดไม่ถูกต้อง"
            );
              // Display error message and redirect to order.php
              $errorMessage = "ไฟล์อัปโหลดไม่ถูกต้อง";
              header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
              exit();
        }
    } else {
        // Return a response indicating an error if the file upload is not successful
        $response = array(
            "status" => "error",
            "msg" => "กรุณาอัพโหลดรูปสลิปก่อนยืนยันชำระเงิน"
        );
          // Display error message and redirect to order.php
          $errorMessage = "เกิดข้อผิดพลาดกรุณาอัพโหลดใหม่อีกครั้ง";
          header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
          exit();
    }
} else {
    // Return a response indicating an error if the form is not submitted via POST method
    $response = array(
        "status" => "error",
        "msg" => "เกิดข้อผิดพลาดกรุณาอัพโหลดใหม่อีกครั้ง"
    );
      // Display error message and redirect to order.php
      $errorMessage = "เกิดข้อผิดพลาดกรุณาอัพโหลดใหม่อีกครั้ง";
      header("Location: myorder.php?status=error&msg=" . urlencode($errorMessage));
      exit();
}
echo json_encode($response);
?>