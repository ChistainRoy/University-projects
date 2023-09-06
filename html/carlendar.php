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
                              <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">ถูกจองแล้ว ` +
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
<style>
   input[type="date"] {
      border-color: #696cff;
   }


   .flex {
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .arrow {
      transform: translate(-50%, -50%);
      transform: rotate(90deg);
      cursor: pointer;
      margin-top: 55px;
   }

   .text {
      margin-top: 50px;
      margin-left: 20px;
   }

   .arrow span {
      display: block;
      width: 0.5vw;
      height: 0.5vw;
      border-bottom: 5px solid #696cff;
      border-right: 5px solid #696cff;
      transform: rotate(45deg);
      animation: animate 2s infinite;
   }

   .arrow span:nth-child(2) {
      animation-delay: -0.2s;
   }

   .arrow span:nth-child(3) {
      animation-delay: -0.4s;
   }

   @keyframes animate {
      0% {
         opacity: 0;
         transform: rotate(45deg) translate(-20px, -20px);
      }

      50% {
         opacity: 1;
      }

      100% {
         opacity: 0;
         transform: rotate(45deg) translate(20px, 20px);
      }
   }
</style>

<body>
   <nav class="navbar bg-primary position-fixed w-100" style="z-index: 999">
      <div class="container">
         <div class="navbar-brand text-white">การจองและตรวจสอบตารางทำงานของร้าน</div>
      </div>
   </nav>

   <div class="container">
      <div class="flex">
         <form action="insertbooking.php" method="post">
            <div class="row mt-5">
               <input type="date" id="date-input" class="col-3 datepicker mb-5 mt-5 text-center" name="date">
               <div class="arrow col-2">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
               <div class="text col-6">
                  <h5>กดรูปปฎิทินเพื่อเลือกจอง</h3>
               </div>
               <button type="submit" class="btn btn-primary mb-2">ดำเนินการต่อ</button>
               <a href="cartproduct.php" class="btn btn-secondary mb-2">ย้อนกลับ</a>
            </div>
         </form>
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

         // echo "วันปัจุบัน: " . $presentDate;
         ?>
      </div>
      <hr class="mt-3">
      <h3 class="text-center">ตารางแสดงข้อมูลวันทำงานของร้าน</h3>
      <div id="calendar"></div>
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