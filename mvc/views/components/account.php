<div class="container mb-5">
    <div class="row mt-5" style="min-height: 400px">
        <div class="col-12 col-md-3">
            <div class="d-flex">
                <img src="<?= $this->url_img .'/'. $data['account']['anhNguoiDung'] ?>" class="rounded-circle" width="65px" height="65px">
                <div class="ml-2">
                    <p class="mb-1">Thông tin tài khoản</p>
                    <h6 style="font-size: 18px" class="font-weight-bold"><?= $data['account']['tenNguoiDung'] ?></h6>
                </div>
            </div>

            <!-- menu boostrap tab -->
            <div class="nav flex-column nav-pills mt-3 mb-4" id="account" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-home" aria-selected="true" style="font-size: 17px;">Thông tin tài khoản</a>

                <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false" style="font-size: 17px;">Thay đổi mật khẩu</a>

                <a class="nav-link" id="v-pills-buy-tab" data-toggle="pill" href="#v-pills-buy" role="tab" aria-controls="v-pills-buy" aria-selected="false" style="font-size: 17px;">Lịch sử mua hàng</a>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <!-- Nội dung của boostrap tab -->
            <div class="tab-content" id="account">

                <!-- Phần thông tin tài khoản -->
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h5>Thông tin tài khoản</h5>
                    <div class="border bg-white rounded  p-3">
                        <form action="<?= $this->url_account?>/updateProfile" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Họ tên </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tenNguoiDung" id="name" value="<?= $data['account']['tenNguoiDung'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="soDienThoai" value="<?= $data['account']['soDienThoai'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" value="<?= $data['account']['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="diaChi" value="<?= $data['account']['diaChi'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img" class="col-sm-2 col-form-label">Thay đổi ảnh</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="anhCu" value="<?= $data['account']['anhNguoiDung'] ?>">
                                    <input type="file" name="anhNguoiDung" class="form-control-file" id="img">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-primary" value="Cập nhật">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Phần thay đổi mật khẩu -->
                <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                    <h5>Thay đổi mật khẩu</h5>
                    <div class="border bg-white rounded  p-3">

                        <?php if (isset($data['success'])) : ?>
                            <div class="alert alert-success"><?= $data['success'] ?></div>
                        <?php endif ?>

                        <form action="<?=$this->url_account?>/updatePassword" method="POST" onsubmit="return checkPass()">
                            <div class="form-group row">
                                <label for="oldPass" class="col-sm-2 col-form-label">Mật khẩu cũ</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="oldPass" name="matKhau" placeholder="Old password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newPass" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="matKhauMoi" id="newPass" placeholder="Password must be over 6 characters">
                                </div>
                            </div>
                            <div class=" form-group row">
                                    <label for="newPassAgain" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="newPassAgain" placeholder="Enter password again">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <input type="submit" name="changePassword" class="btn btn-primary" value="Cập nhật">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

                <!-- Phần lịch sử mua hàng -->
                <div class="tab-pane fade" id="v-pills-buy" role="tabpanel" aria-labelledby="v-pills-buy-tab">
                    <h5>Lịch sử mua hàng</h5>
                    <div>
                        <table class="table border table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Ngày mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                <?php foreach($data['historyBuyPro'] as $product): $count++; ?>
                                    <tr>
                                        <td scope="row"><img src="<?=$this->url_img .'/'. $product['anhSanPham']?>" class="rounded" height="50px" width="50px"> <?=$product['tenSanPham']?></td>
                                        <td><?=number_format($product['soTien'])?> đ</td>
                                        <td><?=$product['soLuongMua']?></td>
                                        <td><?=$product['ngayMua']?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <?php if($count == 0): ?>
                            <p>Bạn chưa mua sản phẩm nào!</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function checkPass() {
        let newPass = document.getElementById('newPass').value;
        let newPassAgain = document.getElementById('newPassAgain').value;

        if (newPass == newPassAgain) {
            return true;
        } else {
            alert('Mật khẩu xác nhận không khớp!');
            return false;
        }
    }
</script>