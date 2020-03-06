<div class="box-content">
    <h5 class="intro-product">Danh sách sản phẩm</h5>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Lượt xem</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['products'] as $product): ?>
                    <tr>
                        <td scope="row"><?=$product['maSanPham']?></td>
                        <td>
                            <img src="<?= $this->url_img. '/' .$product['anhSanPham']; ?>" class="rounded" height="45px" width="45px">
                            <?=$product['tenSanPham']?> </td>
                        <td><?= number_format($product['giaSanPham']) ?> đ</td>
                        <td><?=$product['giamGia']?> %</td>
                        <td><?=$product['soLuong']?></td>
                        <td><?=$product['soLuotXem']?></td>
                        <td>
                            <a class="btn btn-primary rounded-pill button" 
                            href="<?=$this->url_admin .'/editProduct/'. $product['maSanPham'] ?>" role="button">Sửa</a>
                            <a class="btn btn-primary rounded-pill button" href="<?=$this->url_admin_handing?>/deleteProduct/<?=$product['maSanPham']?>" 
                            role="button" onclick="return confirm('Bạn có muốn xóa sản phẩm này ?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>

<a href="<?=$this->url_admin?>/viewNewPro" class="btn btn-primary mt-3" >Thêm sản phẩm</a>