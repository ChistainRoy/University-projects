<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
$databaseIds = array(1, 2, 3);
?>
    <div class="container" action="test2.php" method="POST">
        <form id="myForm">
            <?php foreach ($databaseIds as $id): ?>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="mySwitch<?= $id ?>">
                <input type="hidden" id="hiddenInput<?= $id ?>" value="<?= $id ?>">
                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
            </div>
            <?php endforeach; ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        <?php foreach ($databaseIds as $id): ?>
        $('#mySwitch<?= $id ?>').change(function() {
            var switchValue = $(this).is(':checked');
            var hiddenValue = $('#hiddenInput<?= $id ?>').val();
            if (switchValue) {
                // The switch value is true
                console.log('Switch value is true');
                console.log('Hidden value:', hiddenValue);
            } else {
                // The switch value is false
                console.log('Switch value is false');
                console.log('Hidden value:', hiddenValue);
            }

            $.ajax({
                url: 'test_db.php', // Replace with your server-side URL to handle the request
                type: 'POST', // Use the appropriate HTTP method
                data: {
                    switchValue: switchValue,
                    hiddenValue: hiddenValue
                },
                success: function(response) {
                    // Handle the successful response from the server
                    var parsedResponse = JSON.parse(response);

                    if (parsedResponse.status === "success") {

                        Swal.fire('Success', parsedResponse.msg, 'success');
                    } else if (parsedResponse.status === "error") {

                        Swal.fire('Error', parsedResponse.msg, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.log(xhr.responseText);
                }
            });
        });
        <?php endforeach; ?>
    });
    </script>
</body>

</html>