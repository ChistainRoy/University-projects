
   <?
    $flag = true;

    while ($flag) {
        // First loop
        for ($i = 1; $i <= 3; $i++) {
            echo "First Loop: " . $i . "<br>";
        }

        $flag = false; // Set flag to false to exit the first loop

        // Second loop
        for ($j = 1; $j <= 2; $j++) {
            echo "Second Loop: " . $j . "<br>";
        }

        $flag = true; // Set flag to true to re-enter the first loop
    }
    ?>