<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $values = $_POST["values"]; // Access the array values

    // Loop through the values
    foreach ($values as $value) {
        echo $value . "<br>";
        echo $_POST['productid'] . "<br>";
    }
}
