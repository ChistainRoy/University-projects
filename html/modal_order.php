<!-- Modal del -->
<div class="modal fade" id="normalModal<?php echo $fetch['order_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php 
            $id_payment = $fetch['order_id'];
            $queryimg = mysqli_query($conn, "SELECT * FROM `payment` WHERE oder_id = $id_payment");
            $row = mysqli_fetch_array($queryimg);
            ?>
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cm_edit.php" method="get">
                    <div class="row g-2">
                        <div class="col mt-3">
                            <label for="nameBasic" class="form-label">
                                <img>
                            </label>
                            <input type="hidden" id="nameBasic" class="form-control d-none" name="idorder"
                                value="<?php echo $fetch['order_id'] ?>"></input>
                            <input type="hidden" id="nameBasic" class="form-control d-none" name="idcm"
                                value="<?php echo $fetch['cm_id'] ?>"></input>
                            <img src="<?php echo $row['pay_img'] ?>" alt="slip" width="400" height="500" class="mx-5">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    ไม่อนุมัติ
                </button>
                <button type="submit" class="btn btn-primary" name="deldata">อนุมัติ</button>
            </div>
            </form>
        </div>
    </div>
</div>