<div class="p-3 bg-white border-bottom d-flex justify-content-between">
    <div class="d-flex">
        <img src="<?= $this->url_img .'/'. $data['customer']['anhNguoiDung'] ?>" class="rounded" height="70px" width="70px">
        <h5 class="font-weight-bold ml-2"><?= $data['customer']['tenNguoiDung'] ?></h5>
    </div>
</div>


<div class="card mt-3">
    <div class="card-body">
        <h5>Lịch sử mua hàng</h5>
        <table class="table table-hover mt-3">
            <thead id="thead">
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng mua</th>
                    <th scope="col">Ngày mua</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                <?php foreach ($data['history'] as $product) : $count++; ?>
                    <tr>
                        <td scope="row"><img src="<?= $this->url_img .'/'. $product['anhSanPham'] ?>" class="rounded" height="50px" width="50px"> <?= $product['tenSanPham'] ?></td>
                        <td><?= number_format($product['giaSanPham'] - $product['giaSanPham'] / 100 * $product['giamGia']) ?> đ</td>
                        <td><?= $product['soLuongMua'] ?></td>
                        <td><?= $product['ngayMua'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php if($count == 0) : ?>
            <script>
                document.getElementById('thead').style.display = 'none';
            </script>
            <p>Tài khoản chưa mua sản phẩm nào</p>
        <?php endif; ?>
    </div>
</div>

<a href="<?=$this->url_admin?>/customers" class="btn btn-primary mt-3">Danh sách người dùng</a>