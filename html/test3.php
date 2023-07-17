<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buddy - Aluminum | จองวันตรวจสอบการติดตั้ง</title>
    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme_user.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/fullcalendar.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Thai:300,400,500,600,700" rel="stylesheet" />
    <script type="text/javascript" src="js/fontawesome.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="js/fullcalendar/lib/main.css" rel="stylesheet" />
    <script src="js/fullcalendar/lib/main.js"></script>
</head>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'th',
        timeZone: 'Asia/Bangkok',
        initialView: 'dayGridMonth',
        height: 600,
        events: 'fetchEvents.php',
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        selectable: true,

        eventContent: (info) => {
            let html =
                `<div class="p-2">
          <div class="d-flex">
            <i class="fa-solid fa-user pe-2"></i>
            <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">ถูกจองแล้ว </div>
          </div>`;
            return {
                html: html
            };
        },
        dateClick: function(info) {
            var selectedDate = info.dateStr;

            // Set the value of the input field in the modal
            document.getElementById('selectedDate').value = selectedDate;

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        }
    });

    calendar.render();

    // Handle Save button click inside the modal
    document.getElementById('saveDate').addEventListener('click', function() {
        // Get the selected date value from the input field
        var selectedDate = document.getElementById('selectedDate').value;

        // Perform further actions with the selected date
        console.log('Selected Date:', selectedDate);

        // Hide the modal
        var myModal = bootstrap.Modal.getInstance(document.getElementById('myModal'));
        myModal.hide();

        // Make AJAX request or perform any other actions
        // ...
    });
});
</script>
<style>
html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

#calendar {
    max-width: 600px;
    width: 100%;
}
</style>

<body>
    <div class="container">
        <div id="calendar" class="">
        </div>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label for="selectedDate">Selected Date:</label>
                    <input type="date" id="selectedDate" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveDate">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.getElementById('saveDate').addEventListener('click', function() {
        // Get the selected date value from the input field
        var selectedDate = document.getElementById('selectedDate').value;

        // Make AJAX request
        $.ajax({
            url: 'testcarlendar.php', // Replace with your server-side URL to handle the request
            type: 'POST',
            data: {
                selectedDate: selectedDate
            },
            success: function(response) {
                // Handle the successful response from the server
                var parsedResponse = JSON.parse(response);
                console.log(response);
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

        // Hide the modal
        var myModal = bootstrap.Modal.getInstance(document.getElementById('myModal'));
        myModal.hide();
    });
    </script>
</body>

</html>