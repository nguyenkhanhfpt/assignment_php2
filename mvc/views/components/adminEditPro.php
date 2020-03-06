<?php if(isset($data['success'])): ?>
    <div class="alert alert-success">
        <?=$data['success']?>
    </div>
<?php endif ?>

<div class="box-content">

    <h5 class="intro-product mb-3">Chỉnh sửa sản phẩm 
        <span class="text-danger font-weight-bold"><?=$data['product']['tenSanPham']?></span>
    </h5>

    <form action="<?=$this->url_admin_handing?>/editProduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nameProduct">Tên sản phẩm</label>
            <input type="text" class="form-control" name="tenSanPham" id="nameProduct" value="<?=$data['product']['tenSanPham']?>" placeholder="Name Product">
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="price">Giá sản phẩm</label>
                <input type="text" name="giaSanPham" class="form-control" id="price" value="<?=$data['product']['giaSanPham']?>" placeholder="Price">
            </div>
            <div class="form-group col-6">
                <label for="sale">Giảm giá</label>
                <div class="input-group">
                    <input type="text" id="sale" name="giamGia" class="form-control" value="<?=$data['product']['giamGia']?>" placeholder="Sale" aria-label="Recipient's username" aria-describedby="sale">
                    <div class="input-group-append">
                        <span class="input-group-text" id="sale">%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="hang">Thương hiệu</label>
                <select name="mathuongHieu" class="form-control" id="hang">
                    <option value="<?=$data['product']['maThuongHieu']?>">---</option>
                    <?php foreach ($data['factory'] as $item) : ?>
                        <option value="<?= $item['maThuongHieu'] ?>"><?= $item['tenThuongHieu'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-6">
                <label for="quantify">Số lượng</label>
                <input type="text" name="soLuong" class="form-control" id="quantify" value="<?=$data['product']['soLuong']?>" placeholder="Quantify">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="screen">Màn hình</label>
                <div class="input-group">
                    <input type="text" id="screen" name="manHinh" class="form-control" value="<?=$data['product']['manHinh']?>" placeholder="Screen">
                </div>
            </div>
            <div class="form-group col-6">
                <label for="camera">Camera</label>
                <div class="input-group">
                    <input type="text" id="camera" name="camera" class="form-control" value="<?=$data['product']['camera']?>" placeholder="Camera" aria-label="Recipient's username" aria-describedby="camera">
                    <div class="input-group-append">
                        <span class="input-group-text" id="camera">MP</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="ram">Ram</label>
                <div class="input-group">
                    <input type="text" id="ram" name="ram" class="form-control" value="<?=$data['product']['ram']?>" placeholder="Ram" aria-label="Recipient's username" aria-describedby="ram">
                    <div class="input-group-append">
                        <span class="input-group-text" id="ram">GB</span>
                    </div>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="memory">Bộ nhớ</label>
                <div class="input-group">
                    <input type="text" id="memory" name="boNho" class="form-control" value="<?=$data['product']['boNho']?>" placeholder="Memory" aria-label="Recipient's username" aria-describedby="memory">
                    <div class="input-group-append">
                        <span class="input-group-text" id="memory">GB</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="operatingSystem">Hệ điều hành</label>
                <input type="text" name="heDieuHanh" class="form-control" id="operatingSystem" value="<?=$data['product']['heDieuHanh']?>" placeholder="Operating system">
            </div>
            <div class="form-group col-6">
                <label for="chip">Chipset</label>
                <input type="text" name="chip" class="form-control" id="chip" value="<?=$data['product']['chip']?>" placeholder="Chip">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="imgProduct">Ảnh sản phẩm</label>
                <input type="file" class="form-control-file" name="anhSanPham" id="imgProduct">
                <input type="hidden" name="anhSanPhamCu" value="<?=$data['product']['anhSanPham']?>">
                <input type="hidden" name="maSanPham" value="<?=$data['product']['maSanPham']?>">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Thay đổi</button>
    </form>
</div>

<a href="<?=$this->url_admin?>/products" class="btn btn-primary my-2">Danh sách sản phẩm</a>