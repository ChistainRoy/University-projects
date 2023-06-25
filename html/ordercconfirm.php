 <?php
    session_start();
    $storedArray = $_SESSION['values'];
    $storedArray2 = $_SESSION['productid'];
    print_r($storedArray2);
    print_r($storedArray);
    echo $_SESSION['date'];
    ?>