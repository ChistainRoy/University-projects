<!-- Modal del -->
<div class="modal fade" id="normalModal<?php echo $fetch['order_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cm_edit.php" method="get">
                    <div class="row g-2">
                        <div class="col mt-3">
                            <label for="nameBasic" class="form-label">
                                <h4></h4>
                            </label>
                            <input type="text" id="nameBasic" class="form-control d-none" name="id" value="<?php echo $fetch['cm_id'] ?>" required readonly />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    ไม่อนุมัติ
                </button>
                <button type="submit" class="btn btn-success" name="deldata">อนุมัติ</button>
            </div>
            </form>
        </div>
    </div>
</div>