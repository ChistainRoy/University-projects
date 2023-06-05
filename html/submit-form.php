<?php
session_start(); // Start the session

if (isset($_SESSION['counter'])) {
    $_SESSION['counter']++; // Increment the counter value
} else {
    $_SESSION['counter'] = 1; // Set the counter to 1 if it doesn't exist
}

$counter = $_SESSION['counter']; // Get the counter value


include('connect.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $values = $_POST["values"]; // Access the array values
    $idproduct = $_POST["productid"];
    $combinedArray = array_combine($idproduct, $values);
    // Loop through the values
    foreach ($combinedArray as $productID => $value) {
        echo "Product ID: " . $productID . ", Value: " . $value . "<br>";
        $sql = "SELECT * FROM product WHERE product_id = '$productID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $price = $row['product_price'];
        $total = $price  *  $value;
        echo $total . "<br>";
        $sqlinsert = "INSERT INTO `oderdetail` (`oder_id`, `product_id`, `oder_price`, `oder_qty`) VALUES ('$counter', '$productID', '$total', '$value')";
        $resultinsert = mysqli_query($conn, $sqlinsert);
    }
}
