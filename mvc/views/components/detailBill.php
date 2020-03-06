
<div class="container">

    <?php if(isset($data['success'])): ?>
        <div class="alert alert-success"><?=$data['success']?></div>
    <?php endif ?>

    <div class="shadow bg-white p-3 px-4">
        <h4 class="text-center">ĐƠN HÀNG CHI TIẾT</h4>
        <p class="mb-1"><span class="font-weight-bold">Tên khách hàng:</span> <?=$data['detailBill']['tenNguoiDung']?></p>
        <p class="mb-1"><span class="font-weight-bold">Địa chỉ:</span> <?=$data['detailBill']['diaChi']?></p>
        <p class="mb-1"><span class="font-weight-bold">Số điện thoại:</span> <?=$data['detailBill']['soDienThoai']?></p>
        <p class="mb-1"><span class="font-weight-bold">Email:</span> <?=$data['detailBill']['email']?></p>
        <p class="mb-1"><span class="font-weight-bold">Mã đơn hàng:</span> #<?=$data['detailBill']['maHoaDon']?></p>
        <p class="mb-1"><span class="font-weight-bold">Thời gian mua hàng:</span> <?=$data['detailBill']['thoiGianMua']?></p>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng mua</th>
                </tr>
            </thead>
            <tbody>
                <form action="index.php" id="formQuantifyCart" method="post">
                    <?php foreach ($data['products'] as $product) : ?>
                        <tr>
                            <td scope="row"><img src="<?= $this->url_img .'/'. $product['anhSanPham'] ?>" class="rounded" height="50px" width="50px"></td>
                            <td><?= $product['tenSanPham'] ?></td>
                            <td><?= number_format($product['giaSanPham'] - $product['giaSanPham'] / 100 * $product['giamGia']) ?> đ</td>
                            <td ><?= $product['soLuongMua'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </form>
            </tbody>
        </table>

        <h5 class="text-right font-weight-bold mr-4">Thành tiền: <span class="text-danger"><?=number_format($data['sumPriceBill'])?> đ</span></h5>

        <?php if($data['detailBill']['trangThai'] == 0) : ?>
            <a href="<?=$this->url_admin .'/ship/'. $data['detailBill']['maHoaDon']?>" 
            class="btn btn-primary mt-4">Tiến hành giao hàng</a>
            <a href="<?=$this->url_admin_handing .'/deleteBill/'. $data['detailBill']['maHoaDon']?>"
            class="btn btn-danger mt-4" >Xóa đơn hàng</a>
        <?php endif ?>
    </div>

    <a href="<?=$this->url_admin?>/bill" class="btn btn-primary mt-3 rounded-0"> <- Xem hóa đơn</a>
</div>