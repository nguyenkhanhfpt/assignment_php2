<div class="box-content">
    <h5 class="intro-product">Danh sách hãng điện thoại</h5>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Mã thương hiệu</th>
                    <th scope="col">Tên thương hiệu</th>
                    <th scope="col">Logo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['factory'] as $factory) : ?>
                    <tr>
                        <td scope="row"><?= $factory['maThuongHieu'] ?></td>
                        <td><?= $factory['tenThuongHieu'] ?></td>
                        <td><img src="<?= $this->url_img .'/'. $factory['anhThuongHieu']?>" alt="" width="30px"></td>
                        <td>
                            <a class="btn btn-primary rounded-pill button " href="<?=$this->url_admin .'/editFactory/'. $factory['maThuongHieu']  ?>" role="button">Sửa</a>
                            <a class="btn btn-primary rounded-pill button" href="<?= $this->url_admin_handing ?>/deleteFactory/<?=$factory['maThuongHieu']?>" role="button" onclick="return confirm('Bạn có muốn xóa sản phẩm này ?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>

<button class="btn btn-primary mt-3 mb-2" type="button" data-toggle="collapse" data-target="#newFactory" aria-expanded="false" aria-controls="newFactory">
    Thêm thương hiệu
</button>

<div class="collapse mb-2" id="newFactory" >
    <div class="box-content">
        <h5 class='intro-product mb-3'>Thêm hãng điện thoại mới</h5>

        <form action="<?= $this->url_admin_handing ?>/newFactory" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="idFactory">Mã thương hiệu</label>
                <input type="text" name="maThuongHieu" class="form-control" id="idFactory" placeholder="Id factory">
            </div>
            <div class="form-group">
                <label for="nameFactory">Tên thương hiệu</label>
                <input type="text" name="tenThuongHieu" class="form-control" id="nameFactory" placeholder="Name factory">
            </div>
            <div class="form-group">
                <label for="imgFactory">Ảnh thương hiệu</label>
                <input type="file" class="form-control-file" name="anhThuongHieu" id="imgFactory">
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
        
    </div>
</div>