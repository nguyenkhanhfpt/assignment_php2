<div class="container pt-4">
    <div class="row">
        <div class="col-md-5 text-center">
            <img src="<?= $this->url_img . '/' . $data['product']['anhSanPham'] ?>" width="100%" class="block__pic">
        </div>
        <div class="col-md-7">
            <h3 class="intro-product mt-2"><?= $data['product']['tenSanPham'] ?></h3>
            <h4 class="product-price mb-4">
                <?php if ($data['product']['giamGia'] > 0) : ?>
                    <span class="text-muted small"><s><?= number_format($data['product']['giaSanPham']) ?> đ</s></span>
                    <?= number_format($this->priceSale($data['product']['giaSanPham'], $data['product']['giamGia'])) ?> đ
                <?php else : ?>
                    <?= number_format($data['product']['giaSanPham']) ?> đ
                <?php endif ?>
            </h4>

            <span>Số lượng:</span>
            <form action="<?= $this->url_cart ?>/addCart" method="post">
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <div class="w-20">
                            <input type="number" value="1" name="soLuong" class="form-control w-75 form-number" min="1">
                        </div>
                        <div class="w-80">
                            <input type="hidden" name="maSanPham" value="<?= $data['product']['maSanPham'] ?>">
                            <input type="hidden" name="anhSanPham" value="<?= $data['product']['anhSanPham'] ?>">
                            <input type="hidden" name="tenSanPham" value="<?= $data['product']['tenSanPham'] ?>">
                            <input type="hidden" name="giaSanPham" value="<?= $this->priceSale($data['product']['giaSanPham'], $data['product']['giamGia']) ?>">
                            <input type="submit" name="addCart" class="btn btn-primary rounded-pill addCart" value="Thêm vào giỏ hàng">
                        </div>
                    </div>
                </div>
            </form>
            
            <?php if($data['product']['soLuong'] <= 0): ?>
                <p class="text-danger font-weight-bold">Sản phẩm tạm hết hàng</p>
            <?php endif ?>
        </div>
    </div>

    <h4 class="intro-product text-center mt-5">Thông số kỹ thuật</h4>
    <ul class="fs-dttsul">
        <li>
            <label>Màn hình:</label>
            <div>
                <?php if (strlen($data['infoPro']['manHinh']) > 0) : ?>
                    <?= $data['infoPro']['manHinh'] ?>
                <?php else : ?>
                    Đang cập nhật
                <?php endif ?>
            </div>
        </li>
        <li>
            <label>Camera:</label>
            <?php if (strlen($data['infoPro']['camera']) > 0) : ?>
                <?= $data['infoPro']['camera'] . 'MP' ?>
            <?php else : ?>
                Đang cập nhật
            <?php endif ?>
        </li>
        <li>
            <label>RAM:</label>
            <?php if (strlen($data['infoPro']['ram']) > 0) : ?>
                <?= $data['infoPro']['ram'] . 'GB' ?>
            <?php else : ?>
                Đang cập nhật
            <?php endif ?>
        </li>
        <li>
            <label>Bộ nhớ trong:</label>
            <?php if (strlen($data['infoPro']['boNho']) > 0) : ?>
                <?= $data['infoPro']['boNho'] . 'GB' ?>
            <?php else : ?>
                Đang cập nhật
            <?php endif ?>
        </li>
        <li>
            <label>Hệ điều hành:</label>
            <?php if (strlen($data['infoPro']['heDieuHanh']) > 0) : ?>
                <?= $data['infoPro']['heDieuHanh'] ?>
            <?php else : ?>
                Đang cập nhật
            <?php endif ?>
        </li>
        <li>
            <label>Chipset:</label>
            <?php if (strlen($data['infoPro']['chip']) > 0) : ?>
                <?= $data['infoPro']['chip'] ?>
            <?php else : ?>
                Đang cập nhật
            <?php endif ?>
        </li>
    </ul>

    <h4 class="intro-product text-center mt-5 mb-3">Các điện thoại cùng hãng</h4>
    <div class="row">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-6 col-sm-4 col-md-3 mb-3 mb-md-2 px-2">
                <div class="product-main border-0">
                    <a href="<?= $this->url_pro ?>/viewProduct/<?= $product['maSanPham'] ?>">
                        <?php if ($product['giamGia'] > 0) : ?>
                            <div class="sale-box">-<?= $product['giamGia'] ?>%</div>
                        <?php endif ?>
                        <?php if ($this->howLong($product['ngayNhap']) <= 3) : ?>
                            <img src="<?= $this->url_img ?>/new-tag.png" width="40px" height="30px" class="new-box">
                        <?php endif ?>
                        <div class="product-box">
                            <img src="<?= $this->url_img . '/' . $product['anhSanPham']; ?>" class="w-100 product-img">
                        </div>
                        <div class="px-3 pb-3 name-product-over">
                            <a href="" class="product-title"><?= $product['tenSanPham'] ?></a>
                            <p class="product-price">
                                <?php if ($product['giamGia'] > 0) : ?>
                                    <span class="text-muted small"><s><?= number_format($product['giaSanPham']) ?> đ</s></span>
                                    <?= number_format($this->priceSale($product['giaSanPham'], $product['giamGia'])) ?> đ
                                <?php else : ?>
                                    <?= number_format($product['giaSanPham']) ?> đ
                                <?php endif ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="my-4">
        <h5 class="intro-product">Bình luận</h5>
        <hr>
        <form action="<?= $this->url_pro ?>/comment" method="POST">
            <div class="form-group">
                <textarea class="form-control" rows="2" name="noiDung" placeholder="Viết bình luận của bạn"></textarea>
                <input type="hidden" name="maNguoiDungBinhLuan" value="<?= $_SESSION['maNguoiDung'] ?>">
                <input type="hidden" name="maSanPham" value="<?= $data['product']['maSanPham'] ?>">
            </div>
            <div class="d-flex flex-row-reverse">
                <input type="submit" value="Gửi bình luận" class="btn btn-danger">
            </div>
        </form>

        <hr>
        <?php foreach ($data['comments'] as $comment) : ?>
            <div class="d-flex justify-content-between bg-white p-2 mb-2 rounded">
                <div class="d-flex">
                    <div class="mr-2">
                        <img src="<?= $this->url_img . '/' . $comment['anhNguoiDung'] ?>" width="35px" height="35px">
                    </div>
                    <div>
                        <p class="mb-2 font-weight-bold"><?= $comment['tenNguoiDung'] ?> <span class="text-muted font-weight-light small ml-2"><?= $comment['ngayBinhLuan'] ?></span></p>
                        <p><?= $comment['noiDung'] ?></p>
                    </div>
                </div>
                <?php if($comment['maNguoiDungBinhLuan'] == $_SESSION['maNguoiDung']) : ?>
                    <a href="<?=$this->url_pro?>/deleteComment/<?=$comment['maBinhLuan']?>" class="small text-danger float-right">Xóa</a>
                <?php endif ?>
            </div>
        <?php endforeach ?>

    </div>

</div>