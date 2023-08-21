<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include('connect.php');

    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $id = $_POST["id"];

    // Process your database update here
    // Example: Insert the rating and comment into a ratings table
    $sql = "INSERT INTO comment (order_id, comment_img, comment_detail) VALUES ('$id','$rating', '$comment')";

    if ($conn->query($sql) === TRUE) {
        $response = array("status" => "success", "message" => "Rating and comment saved successfully!");
    } else {
        $response = array("status" => "error", "message" => "Failed to save rating and comment.");
    }

    echo json_encode($response);
    $conn->close();
}
