<div class="container mb-5">
    <div class="row mt-3 mb-3">
        <div class="col-12 col-md-3">
        </div>
        <div class="d-none d-md-block col-md-9">
            <form action="" method="POST" id="formSort">
                <div class="form-group d-flex justify-content-end align-items-center">
                    <label class="text-secondary m-0 pr-2" for="">Sắp xếp theo: </label>
                    <select class="form-control rounded-0 w-20" id="sort" name="sort">
                        <option>----</option>
                        <option value="default">Mặc định</option>
                        <option value="viewest">Xem nhiều nhất</option>
                        <option value="lowestPrice">Giá thấp nhất</option>
                        <option value="highestPrice">Giá cao nhất</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-3 order-2 order-md-1">
            <p class="categories">DANH MỤC SẢN PHẨM</p>
            <ul class="list-group">
                <?php foreach ($data['factory'] as $item) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center mb-1 border-0 pl-0">
                        <a href="<?=$this->url_pro .'/filter/'. $item['maThuongHieu']?>" class="text-decoration-none text-dark"><?= $item['tenThuongHieu'] ?></a>
                        <span class="badge badge-primary badge-pill bg-transparent text-dark border"><?= $item['count(S.tenSanPham)'] ?></span>
                    </li>
                <?php endforeach ?>
            </ul>

            <!-- Top rate -->
            <p class="categories mt-4">TOP SẢN PHẨM</p>
            <div class="d-flex flex-column">
                <?php foreach ($data['topPro'] as $topPro) : ?>
                    <div class="d-flex mb-4">
                        <a href="<?= $this->url_pro .'/viewProduct/'. $topPro['maSanPham'] ?>">
                            <img src="<?= $this->url_img ?>/<?= $topPro['anhSanPham'] ?>" width="70px" height="70px">
                        </a>
                        <div class="pl-4 pl-md-2">
                            <p class="mb-2 top-product"><a href="<?= $this->url_pro .'/viewProduct/'. $topPro['maSanPham'] ?>" 
                            class="text-secondary text-decoration-none"><?= $topPro['tenSanPham'] ?></a></p>
                            <strong><?=number_format($topPro['giaSanPham'])?> đ</strong>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-12 col-md-9 order-md-2">
            <div class="row" id="products">
                <?php $count = 0; ?>
                <?php foreach ($data['products'] as $product) : $count++; ?>
                    <div class="col-6 col-sm-4 col-md-3 mb-3 mb-md-2 px-2">
                        <div class="product-main border-0">
                            <a href="<?= $this->url_pro ?>/viewProduct/<?= $product['maSanPham'] ?>">
                                <?php if ($product['giamGia'] > 0) : ?>
                                    <div class="sale-box">-<?= $product['giamGia'] ?>%</div>
                                <?php endif ?>
                                <?php if ($this->howLong($product['ngayNhap']) <= 3) : ?>
                                    <img src="<?=$this->url_img?>/new-tag.png" width="40px" height="30px" class="new-box">
                                <?php endif ?>
                                <div class="product-box">
                                    <img src="<?= $this->url_img . '/' . $product['anhSanPham']; ?>" class="w-100 product-img">
                                </div>
                                <div class="px-3 pb-3 name-product-over">
                                    <a href="" class="product-title"><?= $product['tenSanPham'] ?></a>
                                    <p class="product-price">
                                        <?php if($product['giamGia'] > 0): ?>
                                        <span class="text-muted small"><s><?=number_format($product['giaSanPham'])?> đ</s></span> 
                                        <?= number_format($this->priceSale($product['giaSanPham'], $product['giamGia'])) ?> đ
                                        <?php else: ?>
                                            <?= number_format($product['giaSanPham']) ?> đ
                                        <?php endif ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
                <?= $count == 0 ? " Không có sản phẩm nào" : ''; ?>
            </div>
            
            <?php if(isset($data['displayViewMore'])) : ?>
                <span id="numEndViewMore" class="d-none"><?=$data['numEndViewMore']?></span>
                <a href="javascript:void(0)" id="viewMore" class="text-decoration-none mt-3 mb-4 viewMore">Xem thêm</a>
            <?php endif ?>

        </div>
    </div>
</div>


<script src="<?=$this->url_js?>/submit.js"></script>
<script src="<?=$this->url_js?>/ajaxViewMorePro.js"></script>