<h4>Hóa đơn mới</h4>

<div class="row mt-3">
    <?php $count = 0; ?>
    <?php foreach ($data['newBill'] as $bill) : $count++; ?>
        <div class="col-3 mb-3">
            <div class="p-3 shadow bg-white">
                <div class="d-flex">
                    <img src="<?= $this->url_img . '/' . $bill['anhNguoiDung'] ?>" class="rounded-circle" width="45px" height="45px">
                    <div class="ml-2">
                        <p class="font-weight-bold mb-0"><?= $bill['tenNguoiDung'] ?></p>
                        <span class="small text-secondary"><?= $bill['thoiGianMua'] ?></span>
                    </div>
                </div>
                <hr>
                <div>
                    <p class="small text-muted mb-1">Mã đơn hàng: #<?= $bill['maHoaDon'] ?></p>
                    <p class="small text-muted mb-1">Số sản phẩm mua: <?= $bill['count(C.maSanPham)'] ?></p>
                    <p class="small text-muted">Tổng tiền: <?= number_format($bill['SUM(C.soTien)']) ?> đ</p>
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                    <a href="<?=$this->url_admin .'/detailBill/'. $bill['maHoaDon']?>" class="btn btn-primary rounded-0">Kiểm tra</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php if ($count == 0) : ?>
        <p class="ml-3">Không có hóa đơn mới nào</p>
    <?php endif ?>
</div>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#bill" aria-expanded="false" aria-controls="collapseExample">
    Hóa đơn đã thanh toán
</button>

<div class="collapse" id="bill">
    <div class="row mt-3">
        <?php $count = 0; ?>
        <?php foreach ($data['oldBill'] as $bill) : $count++; ?>
            <div class="col-3 mb-3">
                <div class="p-3 shadow bg-white">
                    <div class="d-flex">
                        <img src="<?= $this->url_img . '/' . $bill['anhNguoiDung'] ?>" class="rounded-circle" width="45px" height="45px">
                        <div class="ml-2">
                            <p class="font-weight-bold mb-0"><?= $bill['tenNguoiDung'] ?></p>
                            <span class="small text-secondary"><?= $bill['thoiGianMua'] ?></span>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p class="small text-muted mb-1">Mã đơn hàng: #<?= $bill['maHoaDon'] ?></p>
                        <p class="small text-muted mb-1">Số sản phẩm mua: <?= $bill['count(C.maSanPham)'] ?></p>
                        <p class="small text-muted">Tổng tiền: <?= number_format($bill['SUM(C.soTien)']) ?> đ</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="<?=$this->url_admin .'/detailBill/'. $bill['maHoaDon']?>" class="btn btn-primary rounded-0">Xem lại</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php if ($count == 0) : ?>
            <p class="ml-3">Chưa có đơn hàng nào!</p>
        <?php endif ?>
    </div>
</div>