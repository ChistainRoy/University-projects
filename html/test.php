<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="submit-form.php">
        <?php
        $loopValues = array("Value 1", "Value 2", "Value 3");

        foreach ($loopValues as $index => $value) {
            echo '<input type="text" name="values[]" value="' . $value . '">';
        }
        ?>

        <input type="submit" value="Submit">
    </form>
</body>

</html>