<div class="box-content">
    <h5>Danh sách người dùng</h5>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['customers'] as $customer) : ?>
                    <tr>
                        <td scope="row"><img src="<?= $this->url_img .'/'. $customer['anhNguoiDung'] ?>" class="rounded-circle" height="45px" width="45px"></td>
                        <td>
                            <?= $customer['tenNguoiDung'] ?>
                        </td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['soDienThoai'] ?></td>
                        <td><?= $customer['diaChi'] ?></td>
                        <td>
                            <a class="btn btn-primary rounded-pill" href="<?= $this->url_admin .'/detailAccount/'. $customer['maNguoiDung'] ?>" role="button">Chi tiết</a>
                            <a class="btn btn-primary rounded-pill" href="<?= $this->url_admin_handing .'/deleteAccount/'. $customer['maNguoiDung'] ?>" onclick="return confirm('Bạn có muốn xóa người dùng này ?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>