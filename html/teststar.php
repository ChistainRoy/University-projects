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
<style>
    .star-rating {
        font-size: 30px;
    }

    .star {
        cursor: pointer;
        color: lightgray;
    }

    .star.active {
        color: gold;
    }
</style>

<body>
    <div class="star-rating">
        <span class="star" data-rating="1">&#9733;</span>
        <span class="star" data-rating="2">&#9733;</span>
        <span class="star" data-rating="3">&#9733;</span>
        <span class="star" data-rating="4">&#9733;</span>
        <div id="rating-description">Please rate this item.</div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".star").click(function() {
            $(this).addClass("active");
            $(this).prevAll().addClass("active");
            $(this).nextAll().removeClass("active");

            var rating = $(this).data("rating");
            var description = getRatingDescription(rating);

            // แสดงคำอธิบายใน element HTML ที่มี id="rating-description"
            $("#rating-description").text(description);

            // ส่งคะแนนไปยังเซิร์ฟเวอร์ (PHP) โดยใช้ AJAX
            $.ajax({
                type: "POST",
                url: "rating.php",
                data: {
                    rating: rating
                },
                success: function(response) {
                    console.log("Rating submitted successfully.");
                }
            });
        });

        // ฟังก์ชันเพื่อเรียกคำอธิบายของคะแนน
        function getRatingDescription(rating) {
            var description = "";
            switch (rating) {
                case 1:
                    description = "Very poor";
                    break;
                case 2:
                    description = "Poor";
                    break;
                case 3:
                    description = "Average";
                    break;
                case 4:
                    description = "Good";
                    break;
                case 5:
                    description = "Excellent";
                    break;
                default:
                    description = "Please rate this item.";
            }
            return description;
        }
    </script>
</body>

</html>