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
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include('connect.php');
    $sql = mysqli_query($conn, "SELECT `date_ operate` FROM `performance` WHERE `order_id` = $id");
    $dates = array(); // สร้าง array เพื่อเก็บข้อมูล
    while ($fetch = mysqli_fetch_array($sql)) {
        $dates[] = $fetch['date_ operate']; // เพิ่มวันที่เข้าไปใน array
        $lastday = $fetch['date_ operate'];
    }
}
?>
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
                var eventDate = info.event.start; // วันที่ของเหตุการณ์
                var datesToCheck = <?php echo json_encode($dates); ?>;

                var isDateInArray = datesToCheck.includes(eventDate.toISOString().split('T')[0]);
                var eventClass = isDateInArray ? 'event-special' : 'event-normal';

                var html =
                    `<div class="p-2 ${eventClass}">
                <div class="d-flex">
                    <i class="fa-solid fa-user pe-2"></i>
                    <div class="custom" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                        ${isDateInArray ? 'วันคำสั่งซื้อนี้' : 'จองแล้ว'}
                    </div>
                </div>
            </div>`;
                return {
                    html: html
                };
            },
            dateClick: function(info) {
                moment.locale('th');
                var selectedDate = info.dateStr;
                var formattedDate = moment(selectedDate).format("DD MMMM YYYY");
                // Show the Form Modal
                $('#formModal').modal('show');
                // Set the selected date in the form
                $('#exampleFormControlTextarea1').val(formattedDate);
                $('#hidden').val(selectedDate);
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

    /* สีพิเศษสำหรับวันคำสั่งซื้อ */
    .event-special {
        background-color: red;
        /* เปลี่ยนสีพื้นหลังให้ตรงกับสีที่คุณต้องการ */
        color: whitesmoke;
        /* เปลี่ยนสีข้อความให้ตรงกับสีที่คุณต้องการ */
        border-radius: 7px;
    }
</style>

<body>
    <div class="container">
        <div id="calendar" class="">
        </div>
    </div>
    <!-- Modal for Form and Image Upload -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">กรอกข้อมูลและอัปโหลดรูปภาพ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลเพิ่มเติม</label>
                            <input class="form-control mb-3" type="text" id="exampleFormControlTextarea1" readonly>
                            <input class="form-control mb-3" type="hidden" name="id" value="<?php echo $id ?>">
                            <input class="form-control mb-3" type="hidden" id="hidden" name="date">
                            <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดงานเพิ่มเติม</label>
                            <textarea class="form-control" id="" rows="3" name="detail"></textarea>
                            <div class="mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="ดำเนินการแก้ไข">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        ดำเนินการแก้ไข
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="รอดำเนินการติดตั้งสินค้า" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        รอดำเนินการติดตั้งสินค้า
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">อัปโหลดรูปภาพ</label>
                            <input class="form-control" type="file" id="formFile" name="imageFile">
                        </div>
                        <div class="mb-3">
                            <img src="" id="preview" width="200" class="mx-auto d-block mt-1">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" id="submitFormButton">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const input = document.getElementById('formFile');
        const preview = document.getElementById('preview');

        input.addEventListener('change', () => {
            const file = input.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                preview.src = reader.result;
            });

            reader.readAsDataURL(file);
        });

        $('#submitFormButton').click(function() {
            var formData = new FormData($('#myForm')[0]);
            $.ajax({
                url: 'submit_form_and_upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle the response from the server
                    var parsedResponse = JSON.parse(response);
                    console.log(response);
                    if (parsedResponse.status === "success") {
                        Swal.fire({
                            title: 'สำเร็จ',
                            text: parsedResponse.msg,
                            icon: 'success',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'man_operate.php';
                            }
                        });
                    } else if (parsedResponse.status === "error") {
                        Swal.fire({
                            title: 'เกิดข้อผิดพลาด',
                            text: parsedResponse.msg,
                            icon: 'error',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'man_operate.php';
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
</body>

</html>