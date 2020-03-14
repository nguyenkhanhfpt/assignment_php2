<header>
    <div class="ma5slider hover-navs hover-dots anim-horizontal outside-dots center-dots inside-navs loop-mode autoplay" data-tempo="5000">
        <div class="slides">
            <a><img src="<?= $this->url_img ?>/photo4.jpg" alt=""></a>
            <a><img src="<?= $this->url_img ?>/header4.jpg" alt=""></a>
            <a><img src="<?= $this->url_img ?>/header3.jpg" alt=""></a>
            <a><img src="<?= $this->url_img ?>/header1.jpg" alt=""></a>
        </div>
    </div>
</header>

<div class="container mt-3 box-factory">

    <a class="btn prev"><img src="<?= $this->url_img ?>/return.svg" alt=""></a>
    <a class="btn next"><img src="<?= $this->url_img ?>/next.svg" alt=""></a>

    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($data['factory'] as $item) : ?>
            <div class="item">
                <a href="<?= $this->url_pro . '/filter/' . $item['maThuongHieu'] ?>" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <img src="<?= $this->url_img . '/' . $item['anhThuongHieu'] ?>" alt="" height="50px">
                    <span class="text-dark mt-2"><?= $item['tenThuongHieu'] ?></span>
                </a>
            </div>
        <?php endforeach ?>

    </div>

</div>

<div class="main">
    <div class="container my-5">
        <h4 class="intro-product">SẢN PHẨM MỚI</h4>
        <div class="row">
            <?php foreach ($data['products'] as $product) : ?>
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
        </div>
        <a href="<?= $this->url_pro ?>" class="text-decoration-none viewMore">Xem thêm</a>


        <h4 class="intro-product mt-5">SẢN PHẨM GIẢM GIÁ TỐT</h4>
        <div class="row">
            <?php foreach ($data['productsSale'] as $product) : ?>
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
        </div>
        <a href="<?= $this->url_pro ?>" class="text-decoration-none viewMore">Xem thêm</a>


        <h4 class="intro-product mt-5">SẢN PHẨM ĐƯỢC XEM NHIỀU</h4>
        <div class="row">
            <?php foreach ($data['productsView'] as $product) : ?>
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
        </div>
        <a href="<?= $this->url_pro ?>" class="text-decoration-none viewMore">Xem thêm</a>


    </div>
</div>

