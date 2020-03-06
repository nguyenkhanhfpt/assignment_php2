<?php if(isset($data['success'])) : ?>
    <div class="alert alert-success">
        <?=$data['success']?>
    </div>
<?php endif ?>

<div class="box-content">
    <h5 class='intro-product mb-3'>Sửa đổi thương hiệu</h5>

    <form action="<?= $this->url_admin_handing ?>/editFactory" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="idFactory">Mã thương hiệu</label>
            <input type="text" name="maThuongHieu" class="form-control" value="<?= $data['factory']['maThuongHieu'] ?>" id="idFactory" readonly>
        </div>
        <div class="form-group">
            <label for="nameFactory">Tên thương hiệu</label>
            <input type="text" name="tenThuongHieu" class="form-control" id="nameFactory" value="<?= $data['factory']['tenThuongHieu'] ?>" placeholder="Name factory">
        </div>
        <div class="form-group">
            <label for="imgFactory">Ảnh thương hiệu</label>
            <input type="file" class="form-control-file" name="anhThuongHieu" id="imgFactory">
            <input type="hidden" name="anhThuongHieuCu" value="<?= $data['factory']['anhThuongHieu'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Thay đổi</button>
    </form>
</div>

<a href="<?=$this->url_admin?>/factory" class="btn btn-primary mt-3">Xem danh sách</a>