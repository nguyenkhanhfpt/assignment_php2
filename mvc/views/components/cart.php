<div class="container bg-white" style="min-height:500px">
    <div class="card border-0">
        <div class="card-body">
            <h4 class="mb-3">Giỏ hàng</h4>

            <?php if(isset($data['err'])): ?>
                <p class="text-danger"><?=$data['err']?></p>
            <?php endif ?>

            <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
                <p>Không có sản phẩm nào</p>
                <a href="<?=$this->url_pro?>" class="btn btn-primary">Tiếp tục mua hàng -></a>
            <?php else : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?=$this->url_cart?>/updateCart" id="formQuantifyCart" method="post">
                                    <?php foreach ($_SESSION['cart'] as $key => $product) : ?>
                                        <tr>
                                            <td scope="row"><img src="<?= $this->url_img .'/'. $product['anhSanPham'] ?>" class="rounded" height="50px" width="50px"></td>
                                            <td><?= $product['tenSanPham'] ?></td>
                                            <td><?= number_format($product['giaSanPham']) ?> đ</td>
                                            <td>
                                                <div class='w-30'>
                                                    <input type="hidden" name="updateCart">
                                                    <input type="number" class="form-control" name="soLuong[<?= $key ?>]" value='<?= $product['soLuong'] ?>' min="1">
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary  button" href="<?=$this->url_cart .'/deleteItem/'. $key ?>" role="button">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </form>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <a href="javascript:void(0);" id="updateCart" class="text-dark">Cập nhật</a> <br>
                        <a href="<?= $this->url_pro ?>" class="text-primary text-decoration-none">Tiếp tục mua hàng</a>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="py-3 d-flex justify-content-between">
                            <p>Thành tiền: </p>
                            <h4 class="text-danger font-weight-bold"><?= number_format($data['sum']) ?> đ</h4>
                        </div>
                        <a href="<?= $this->url_cart ?>/pay" class="btn btn-danger btn-block py-2">Tiến hành thanh toán</a>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>


<script>
    document.getElementById('updateCart').onclick = () => {
        document.getElementById('formQuantifyCart').submit();
    }
</script>