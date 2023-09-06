<!-- Modal order -->
<div class="modal fade" id="normalModal<?php echo $fetch['order_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Add the modal-lg class for a large modal -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cm_passdb.php" method="post" id="fromcon<?php echo $fetch['order_id'] ?>">
                    <div class="row g-2">
                        <div class="col mt-3">
                            <label for="nameBasic" class="form-label">
                                <img>
                            </label>
                            <input type="hidden" id="nameBasic" class="form-control d-none" name="date" value="<?php echo $fetch['order_reserve']; ?>"></input>
                            <input type="hidden" id="nameBasic" class="form-control d-none" name="idorder" value="<?php echo $fetch['order_id'] ?>"></input>
                            <input type="hidden" id="nameBasic" class="form-control d-none" name="idcm" value="<?php echo $fetch['cm_id'] ?>" name="cm_id"></input>
                            <img src="<?php echo $fetch['payment'] ?>" alt="slip" class="img-fluid" name="img"> <!-- Add the img-fluid class for responsive images -->
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    ไม่อนุมัติ
                </button>
                <button type="submit" class="btn btn-primary" name="deldata" data-bs-dismiss="modal">อนุมัติ</button>
            </div>
            </form>
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
                            title: "สำเร็จ",
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
                            title: "ผิดพลาด",
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