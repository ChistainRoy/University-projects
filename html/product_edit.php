<!-- add cart -->
<?php
session_start();
include('connect.php');
if (isset($_POST['addcart'])) {
    $productname = $_POST['productname'];
    $price = ($_POST['price']);
    $detaile = ($_POST['detail']);
    $width = ($_POST['width']);
    $length = ($_POST['length']);
    $color = ($_POST['color']);
    $frame = ($_POST['frame']);
    $type = ($_POST['type']);


    // Upload the file
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);



    // Insert the values into the database
    $sql = "INSERT INTO `product` (`product_name`, `product_price`, `product_detail`, `product_width`, `product_length`, `colorglass`, `colorframe`, `product_img`, `category_id`) 
    VALUES ('$productname', '$price', '$detaile', '$width', '$length', '$color', '$frame', '$target_file', '$type')";
    mysqli_query($conn, $sql);
    header('location: product.php');
}
mysqli_close($conn);
?>


<!-- edit cartdata -->
<?php
session_start();
include('connect.php');
if (isset($_POST['editcart'])) {
    $id = $_POST['productid'];
    $productname = $_POST['productname'];
    $price = ($_POST['price']);
    $detaile = ($_POST['detail']);
    $width = ($_POST['width']);
    $length = ($_POST['length']);
    $color = ($_POST['color']);
    $frame = ($_POST['frame']);
    $type = ($_POST['type']);

    // Insert the values into the database
    $sql = "UPDATE `product` SET `product_name` = '$productname', `product_price` = '$price', `product_detail` = '$detaile', `product_width` = '$width', `product_length` = '$length', `colorglass` = '$color', `colorframe` = '$frame', `category_id` = '$type' WHERE `product`.`product_id` = $id";
    mysqli_query($conn, $sql);
    header('location: product.php');
}
mysqli_close($conn);
?>
<!-- edit cartimg -->
<?php
session_start();
include('connect.php');
if (isset($_POST['editimg'])) {
    $id = $_POST['productid'];
    $oldPhotoPath = ($_POST['old_photo_path']);
    $pic = ($_FILES['pic']);

    if (isset($_FILES['pic'])) {
        $newPhoto = $_FILES['pic'];
        $newPhotoName = $newPhoto['name'];
        unlink($oldPhotoPath);


        // Upload the file
        $targetPath = "upload/$newPhotoName";
        move_uploaded_file($newPhoto['tmp_name'], $targetPath);


        // Insert the values into the database
        $sql = "UPDATE `product` SET `product_img` = '$targetPath' WHERE `product`.`product_id` = $id";
        mysqli_query($conn, $sql);
        header('location: product.php');
    } else {
    }
}
mysqli_close($conn);
