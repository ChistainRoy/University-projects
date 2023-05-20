<!-- Modal add product -->
<div class="modal fade" id="addcart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">เพิ่มข้อมูลสินค้า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="product_edit.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productname" class="form-label">ชื่อสินค้า</label>
                        <input type="text" id="productname" class="form-control" name="productname" required />
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">ราคาสินค้า</label>
                        <input type="number" id="price" class="form-control" name="price" required />
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="width" class="form-label">ความกว้าง</label>
                            <input type="number" id="width" class="form-control" name="width" required />
                        </div>

                        <div class="col mb-3">
                            <label for="length" class="form-label">ความยาว</label>
                            <input type="number" id="length" class="form-control" name="length" required />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="exampleFormControlSelect1" class="form-label">สีกระจก</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="color">
                                <option selected>เลือกสีกระจก</option>
                                <option value="1">สีเขียว</option>
                                <option value="2">สีดำ</option>
                                <option value="3">สีกันยูวี</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">สีกรอบ</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="frame">
                                <option selected>เลือกสีกรอบ</option>
                                <option value="1">สีชา</option>
                                <option value="2">สีนม</option>
                                <option value="3">สีดำ</option>
                                <option value="4">สีไม้</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">รูปสินค้า</label>
                            <input class="form-control" type="file" id="formFile" name="pic" />
                        </div>
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">ประเภทสินค้า</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="type">
                                <option selected>เลือกประเภทสินค้า</option>
                                <?php
                                include('connect.php');
                                $query = mysqli_query($conn, "SELECT * FROM `category`");
                                while ($fetch = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $fetch['id_cat'] ?>"><?php echo $fetch['cat_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="addcart" value="เพิ่มข้อมูล" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>