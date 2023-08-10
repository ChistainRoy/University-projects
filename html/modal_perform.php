<!-- Modal order -->
<div class="modal fade" id="timeline<?php echo $fetch['order_id'] ?>" tabindex="-1" aria-hidden="true">
    <?php
    $id = $fetch['order_id'];
    $sql = "SELECT * FROM `performance` WHERE `order_id` = $id";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">รายละเอียดคำสั่งซื้อ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <section class="p-3">
                    <ul class="timeline-with-icons">
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            $thaiMonths = array(
                                1 => 'มกราคม',
                                2 => 'กุมภาพันธ์',
                                3 => 'มีนาคม',
                                4 => 'เมษายน',
                                5 => 'พฤษภาคม',
                                6 => 'มิถุนายน',
                                7 => 'กรกฎาคม',
                                8 => 'สิงหาคม',
                                9 => 'กันยายน',
                                10 => 'ตุลาคม',
                                11 => 'พฤศจิกายน',
                                12 => 'ธันวาคม'
                            );
                            $date = $fetch['date_ operate'];
                            $timestamp = strtotime($date);
                            $buddhistYear = date("Y", $timestamp) + 543;
                            $monthNumber = date("n", $timestamp); // Get the month number (1-12)
                            $thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
                            $thaiFormattedDate = date("j $thaiMonth พ.ศ. ", $timestamp) . $buddhistYear; ?>
                            <li class="timeline-item mb-5">
                                <div class="text-box">
                                    <span class="timeline-icon">
                                        <i class='bx bxs-cog'></i>
                                    </span>

                                    <h5 class="fw-bold"><?php echo $row['status_performance'] ?></h5>
                                    <p class="text-muted mb-2 fw-bold"><?php echo $thaiFormattedDate ?></p>
                                    <p class="text-muted">
                                        <?php
                                        if ($row['detail_ correction'] == "") {
                                            echo 'ตรวจสอบสถานที่ติดตั้งวันแรก';
                                        } else {
                                            echo $row['detail_ correction'];
                                        }
                                        ?>

                                    </p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    ปิด
                </button>
                <button type="button" class="btn btn-primary">จัดการผลการดำเนินงาน</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exLargeModal<?php echo $fetch['order_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">รายละเอียดคำสั่งซื้อ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <?php
                include('connect.php');
                $id = $fetch['order_id'];
                $sql = "SELECT * FROM `order` INNER JOIN oderdetail ON `order`.`order_id` = oderdetail.oder_id
                        INNER JOIN product ON oderdetail.product_id = product.product_id WHERE `order_id` = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="<?php echo $row['product_img'] ?>" alt="user-avatar" class="d-block rounded" height="150" width="120" />
                            <p><?php echo $row['product_name'] ?><br>ขนาด
                                <?php echo $row['product_width'] ?> X
                                <?php echo $row['product_length'] ?></p>
                            <h5 class="mx-5">ราคา</h5>
                            <h5><?php echo $row['product_price'] ?></h5>
                            <h5>X</h5>
                            <h5><?php echo $row['oder_qty'] ?></h5>
                            <?php $address = $row['order_address'] ?>
                            <?php $total = $row['oder_total'] ?>
                            <?php $price = $total * 20 / 100
                            ?>
                        </div>
                    </div>
                    <hr>
                <?php   }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    ปิด
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#fromcon<?php echo $fetch['order_id'] ?>").submit(function(e) {
            e.preventDefault();
            let fromurl = $(this).attr("action");
            let reqMethod = $(this).attr("method")
            let formdata = $(this).serialize();
            $.ajax({
                url: fromurl,
                type: reqMethod,
                data: formdata,
                success: function(data) {
                    let result = JSON.parse(data);
                    if (result.status == "success") {
                        console.log("Success", result)
                        Swal.fire({
                            title: "success",
                            text: result.msg,
                            icon: result.status,
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(() => {
                            // Redirect after the toast is closed
                            window.location.href = "man_order.php";
                        });
                    } else {
                        console.log("Error", result)
                        Swal.fire({
                            title: "ล้มเหลว",
                            text: result.msg,
                            icon: result.status,
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                }
            })
        })
    })
</script>