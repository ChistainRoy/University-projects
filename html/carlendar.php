<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>ระบบจอง</title>
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/fullcalendar.css" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Thai:300,400,500,600,700" rel="stylesheet" />
   <script type="text/javascript" src="js/fontawesome.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
         selectable: false,
         eventContent: (info) => {
            let html =
               `<div class="p-2">
                      <div class="d-flex">
                              <i class="fa-solid fa-user pe-2"></i>
                              <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">ไม่ว่าง ` +
               `</div>
                  </div>`;
            return {
               html: html
            };
         },
      });

      calendar.render();
   });
</script>

<body>
   <nav class="navbar bg-dark position-fixed w-100" style="z-index: 999">
      <div class="container">
         <div class="navbar-brand text-white">ตารางทำงานของร้าน</div>
      </div>
   </nav>
   <div class="container pt-80">
      <div id="calendar"></div>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
         กดปุ่มนี้เพื่อจอง
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">จองวันตรวจสอบการติดตั้ง</h1>
               </div>
               <div class="modal-body">
                  <form action="insertbooking.php" method="post">
                     <input type="date" id="date-input" class="datepicker" name="date">
                     <?php
                     include('conn.php');
                     $data = array();
                     $sql = "SELECT start FROM events";
                     $result = mysqli_query($conn, $sql);

                     if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                           $blockedDates[] = $row['start'];
                        }
                     }
                     $presentDate = date("Y-m-d");
                     $futureDate = date("Y-m-d", strtotime($presentDate . " +20 days"));

                     echo "วันปัจุบัน: " . $presentDate;
                     ?>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                  <button type="submit" class="btn btn-primary">บันทึก</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      window.onload = function() {
         var dateInput = document.getElementById("date-input");
         var startDate = new Date("<?php echo $presentDate; ?>");
         var endDate = new Date("<?php echo $futureDate; ?>");

         dateInput.addEventListener("focus", function() {
            this.min = formatDate(startDate);
            this.max = formatDate(endDate);
         });

         dateInput.addEventListener("input", function() {
            var selectedDate = new Date(this.value);

            if (selectedDate < startDate || selectedDate > endDate || isBlockedDate(selectedDate)) {
               this.value = "";
               alert("วันที่ท่านเลือกถูกจองแล้ว");
            }
         });
      };

      function formatDate(date) {
         var year = date.getFullYear();
         var month = String(date.getMonth() + 1).padStart(2, "0");
         var day = String(date.getDate()).padStart(2, "0");
         return year + "-" + month + "-" + day;
      }

      function isBlockedDate(date) {
         var blockedDates = <?php echo json_encode($blockedDates); ?>;
         var formattedDate = formatDate(date);
         return blockedDates.includes(formattedDate);
      }
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>