<?php
include("connect.php");
session_start();

if (isset($_GET['did'])) {
    print_r($_GET['did']);
    $id = $_GET['did'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value["productid"] == $_GET['did']) {
            unset($_SESSION['cart'][$key]);
        }
    }
    header('location: cartproduct.php');
}