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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="js/fullcalendar/lib/main.css" rel="stylesheet" />
    <script src="js/fullcalendar/lib/main.js"></script>
    <!-- Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Locale ของภาษาไทย -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/th.js"></script>
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
            eventContent: function(info) {
                var html =
                    `<div class="p-2">
                    <div class="d-flex">
                        <i class="fa-solid fa-user pe-2"></i>
                        <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">ถูกจองแล้ว </div>
                    </div>
                </div>`;
                return {
                    html: html
                };
            },
            dateClick: function(info) {
                moment.locale('th');
                var selectedDate = info.dateStr;
                var formattedDate = moment(selectedDate).format("DD MMMM YYYY"); // จัดรูปแบบเป็น "DD MMMM YYYY" (เช่น "26 กรกฎาคม 2023")
                // Show the Swal modal
                Swal.fire({
                    title: 'จอง',
                    text: formattedDate,
                    icon: 'info',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send the selected date to the server using AJAX
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
                                    Swal.fire('สำเร็จ', parsedResponse.msg, 'success');
                                } else if (parsedResponse.status === "error") {
                                    Swal.fire('เกิดข้อผิดพลาด', parsedResponse.msg, 'error');
                                }
                            },
                            error: function(xhr, status, error) {
                                // Handle errors
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            },
        });
        calendar.render();
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
        max-width: 900px;
        width: 100%;
    }
</style>

<body>
    <div class="container">
        <div id="calendar" class="">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>