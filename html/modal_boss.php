<!-- Modal edit -->
<div class="modal fade" id="basicModal<?php echo $fetch['em_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">แก้ไขข้อมูล ID <?php echo $fetch['em_id'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cm_boss.php" method="post">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <input type="text" id="cm" class="form-control d-none" name="id" value="<?php echo $fetch['em_id'] ?>" required />
                            <label for="username" class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" id="username" class="form-control" name="username" value="<?php echo $fetch['em_username'] ?>" required />
                        </div>
                        <div class="col mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" id="password" class="form-control" name="pass" value="<?php echo $fetch['em_password'] ?>" required />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">ชื่อจริง-นามสกุล</label>
                            <input type="text" id="nameBasic" class="form-control" name="name" value="<?php echo $fetch['name'] ?>" required />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="number" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="number" id="number" class="form-control" name="tel" value="<?php echo $fetch['phone'] ?>" required />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <textarea class="form-control" name="address" rows="3" required><?php echo $fetch['address_em'] ?></textarea><br>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    ยกเลิก
                </button>
                <button type="submit" class="btn btn-primary" name="edituser">ยืนยันการแก้ไข</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal add -->
<div class="modal fade" id="add_boss" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cm_boss.php" method="post">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="username" class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" id="username" class="form-control" name="username" required />
                        </div>
                        <div class="col mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" id="password" class="form-control" name="pass" required />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">ชื่อจริง-นามสกุล</label>
                            <input type="text" id="nameBasic" class="form-control" name="name" required />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="number" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="number" id="number" class="form-control" name="tel" required />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="address" class="form-label">เบอร์โทรศัพท์</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea><br>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    ยกเลิก
                </button>
                <button type="submit" class="btn btn-primary" name="adduser">ยืนยันการแก้ไข</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal del -->
<div class="modal fade" id="del<?php echo $fetch['em_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cm_boss.php" method="get">
                    <div class="row g-2">
                        <div class="col mt-3">
                            <label for="nameBasic" class="form-label">
                                <h4>ต้องการลบ ID <?php echo $fetch['em_id'] ?> หรือไม่</h4>
                            </label>
                            <input type="text" id="nameBasic" class="form-control d-none" name="id" value="<?php echo $fetch['em_id'] ?>" required readonly />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    ยกเลิก
                </button>
                <button type="submit" class="btn btn-danger" name="deldata">ลบ</button>
            </div>
            </form>
        </div>
    </div>
</div>