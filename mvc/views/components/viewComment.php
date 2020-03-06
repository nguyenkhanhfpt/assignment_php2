<div class="box-content">

    <h4 class="mb-3">Bình luận của sản phẩm <span class="text-danger"><?= $data['product']['tenSanPham'] ?></span></h4>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Người bình luận</th>
                <th>Nội dung bình luận</th>
                <th>Ngày bình luận</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['comments'] as $comment) : ?>
                <tr>
                    <td>
                        <img src="<?= $this->url_img .'/'. $comment['anhNguoiDung'] ?>" width="45px" height="45px" class="rounded-circle">
                        <?= $comment['tenNguoiDung'] ?>
                    </td>
                    <td><?= $comment['noiDung'] ?></td>
                    <td><?= $comment['ngayBinhLuan'] ?></td>
                    <td><a href="<?=$this->url_admin_handing .'/deleteComment/'. $comment['maBinhLuan'] ?>" 
                        onclick="return confirm('Bạn có muốn xóa bình luận ?')" class="btn btn-primary">Xóa</a></td>
                    </trtd>
                <?php endforeach ?>
        </tbody>
    </table>
</div>