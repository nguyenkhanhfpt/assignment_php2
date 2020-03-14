<?php $count = 0; ?>
<?php foreach ($data['products'] as $product) : $count++; ?>
    <div class="col-6 col-sm-4 col-md-3 mb-3 mb-md-2 px-2">
        <div class="product-main border-0">
            <a href="<?= $this->url_pro ?>/viewProduct/<?= $product['maSanPham'] ?>">
                <?php if ($product['giamGia'] > 0) : ?>
                    <div class="sale-box">-<?= $product['giamGia'] ?>%</div>
                <?php endif ?>
                <?php if ($this->howLong($product['ngayNhap']) <= 3) : ?>
                    <img src="./public/images/new-tag.png" class="new-box">
                <?php endif ?>
                <div class="product-box">
                    <img src="<?= $this->url_img . '/' . $product['anhSanPham']; ?>" class="w-100 product-img">
                </div>
                <div class="px-3 pb-3 name-product-over">
                    <a href="" class="product-title"><?= $product['tenSanPham'] ?></a>
                    <a href="" class="product-id d-none"><?= $product['maSanPham'] ?></a>
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
            <a href="javascript:void(0)" class="btn-addcart" type="button" data-toggle="tooltip" data-placement="bottom" title="Thêm vào giỏ">
                <i class="fal fa-plus-circle"></i>
            </a>
        </div>
    </div>
<?php endforeach ?>
<?= $count == 0 ? " Không có sản phẩm nào" : ''; ?>