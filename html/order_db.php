<?php
session_start();
include('connect.php');
if (isset($_POST['order'])) {
    $sql = "SELECT oder_id FROM oderdetail ORDER BY oder_id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Retrieve the last value in the 'id' column
        $lastId = $row["oder_id"] + 1;

        echo "Last ID: " . $lastId;
    } else {
        $lastId = 1;
    }
    $storedArray = $_SESSION['productid'];
    $storedArray2 = $_SESSION['values'];
    $date = date("Y/m/d");
    $datereserve = $_SESSION['date'];
    $total = $_SESSION['sum'];
    $user = $_SESSION['username_user'];
    $sql = "SELECT * FROM cumtomer WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_array($result);
    $id = $fetch['cm_id'];
    $address = $_SESSION['newaddress'];
    $sqlorder = "INSERT INTO `order` (`order_id`, `order_date`, `order_reserve`, `oder_total`, `cm_id`, `oder_status`, `em_id`, `order_address`) 
VALUES ('$lastId', '$date', '$datereserve', '$total', '$id', 'รอชำระเงิน', '', '$address')";
    if (mysqli_query($conn, $sqlorder)) {
        $_SESSION['success'] = "ลงทะเบียนสำเร็จ โปรดเข้าสู่ระบบ";
    } else {
        $_SESSION['errors'] = "ลงทะเบียนไม่สำเร็จ";
    }

    $combinedArray = array_combine($storedArray, $storedArray2);
    foreach ($combinedArray as $productID => $value) {
        $sql = "SELECT * FROM product WHERE product_id = '$productID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $price = $row['product_price'];
        $sqlinsert = "INSERT INTO `oderdetail` (`oder_id`, `product_id`, `oder_price`, `oder_qty`) VALUES ('$lastId', '$productID', '$price', '$value')";
        $resultinsert = mysqli_query($conn, $sqlinsert);
    }
    $sqldate = "INSERT INTO `events` (`id`, `start`, `end`, `color`) VALUES ('$lastId', '$datereserve', '$datereserve', '#696cff')";
    $resuldate = mysqli_query($conn, $sqldate);
}
unset($_SESSION['cart']);
unset($_SESSION['productid']);
unset($_SESSION['values']);
unset($_SESSION['total']);
unset($_SESSION['newaddress']);
unset($_SESSION['sum']);
header('location: allproduct.php');
