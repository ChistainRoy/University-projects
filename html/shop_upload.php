<?php
session_start();
$id = $_SESSION['id_em'];
// Database connection configuration
include('connect.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['one'])) {
        $img = "img_1";
    } else if (isset($_POST['two'])) {
        $img = "img_2";
    } else if (isset($_POST['three'])) {
        $img = "img_3";
    } else {
        $_SESSION['errors'] = "กรุณาอัปโหลดรูปภาพ";
        header('location: shop.php');
    }

    // Check if a file was uploaded
    if ($_FILES['fileUpload']['error'] === 0) {
        // Define the directory where you want to store the uploaded files
        $upload_dir = "upload/";

        // Get the file name
        $file_name = $_FILES['fileUpload']['name'];

        // Define the file path (e.g., upload/filename.jpg)
        $file_path = $upload_dir . $file_name;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $file_path)) {
            // Check the dimensions of the uploaded image
            list($width, $height) = getimagesize($file_path);

            if ($width >= 1600 && $height >= 900) {
                // Insert the file path into the database
                $sql = "UPDATE shop SET em_id  = '$id', $img  = '$file_path' WHERE Shop_id = 1";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['success'] = "อัปโหลดรูปภาพสำเร็จ";
                    header('location: shop.php');
                } else {
                    $_SESSION['errors'] = "อัปโหลดรูปผิดพลาด";
                    header('location: shop.php');
                }
            } else {
                $_SESSION['errors'] = "กรุณาอัปโหลดเฉพาะไฟล์รูปภาพหรือขนาดรูปภาพต้องไม่ต่ำกว่า 1600x900 pixels";
                header('location: shop.php');
            }
        } else {
            $_SESSION['errors'] = "อัปโหลดรูปผิดพลาด";
            header('location: shop.php');
        }
    } else {
        $_SESSION['errors'] = "กรุณาอัปโหลดรูปภาพ";
        header('location: shop.php');
    }

    // Close the database connection
    $conn->close();
}

if (isset($_POST['data'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phones = $_POST['phones'];
    $email = $_POST['email'];
    $link = $_POST['link'];
    $linkgoogle = $_POST['linkgoogle'];


    $sql = "UPDATE shop SET em_id  = '$id', boss_name = '$name', address = '$address', phone = '$phones', email = '$email', facebook = '$link', google = '$linkgoogle' WHERE Shop_id = 1";
    $result = mysqli_query($conn, $sql);
    $conn->close();
    if ($result) {
        $_SESSION['success'] = "บันทึกข้อมูลเสร็จสิ้น";
        header('location: shop.php');
    } else {
        $_SESSION['errors'] = "บันทึกข้อมูลผิดพลาด";
        header('location: shop.php');
    }
}
