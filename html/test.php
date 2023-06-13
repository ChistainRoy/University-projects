<!DOCTYPE html>
<html>
<head>
    <title>Disable Dates Example</title>
    <style>
        .datepicker {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Disable Dates Example</h1>
    <input type="date" id="date-input" class="datepicker" name="date">
    <?php
    $presentDate = date("Y-m-d");
    $futureDate = date("Y-m-d", strtotime($presentDate . " +20 days"));
    $blockedDates = array("2023-06-13", "2023-06-15", "2023-06-20"); // Dates retrieved from the database

    echo "Present Date: " . $presentDate;
    ?>
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
</body>
</html>
