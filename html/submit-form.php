<?php
session_start(); // Start the session
include('connect.php');
// if (isset($_SESSION['counter'])) {
//     $_SESSION['counter']++; // Increment the counter value
// } else {
//     $_SESSION['counter'] = 1; // Set the counter to 1 if it doesn't exist
// }

// $counter = $_SESSION['counter']; // Get the counter value

$sql = "SELECT oder_id FROM oderdetail ORDER BY oder_id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();

    // Retrieve the last value in the 'id' column
    $lastId = $row["oder_id"] + 1;

    echo "Last ID: " . $lastId;
} else {
    echo "No rows found";
}

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
        $sqlinsert = "INSERT INTO `oderdetail` (`oder_id`, `product_id`, `oder_price`, `oder_qty`) VALUES ('$lastId', '$productID', '$total', '$value')";
        $resultinsert = mysqli_query($conn, $sqlinsert);
    }
}
header('location:order_confirm.php');
