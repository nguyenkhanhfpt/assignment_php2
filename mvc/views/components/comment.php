<div class="box-content">
    <h4 class="mb-3">Danh sách bình luận</h4>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số bình luận</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['statisticalComemnts'] as $comment) : ?>
                <tr>
                    <td><img src="<?= $this->url_img .'/'. $comment['anhSanPham'] ?>" class="rounded" width="45px" height="45px"></td>
                    <td><?= $comment['tenSanPham'] ?></td>
                    <td><?= $comment['COUNT(maBinhLuan)'] ?></td>
                    <td><a href="<?=$this->url_admin .'/commentProduct/'. $comment['maSanPham'] ?>" class="btn btn-primary">Chi tiết</a></td>
                    </trtd>
                <?php endforeach ?>
        </tbody>
    </table>
</div>