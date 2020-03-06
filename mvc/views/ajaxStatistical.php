<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng bán được</th>
        </tr>
    </thead>
    <tbody id="">
        <?php $count = 1; ?>
        <?php foreach ($data['topBuyPro'] as $product) : ?>
            <tr>
                <td scope="row"><span class="font-weight-bold text-primary"><?= $count++ ?></span></td>
                <td>
                    <img src="<?= $this->url_img . '/' . $product['anhSanPham']; ?>" class="rounded" height="45px" width="45px">
                    <?= $product['tenSanPham'] ?> </td>
                <td><?= $product['SUM(soLuongMua)'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php if ($count == 1) : ?>
    <p class="font-weight-bold text-danger text-center">Không có sản phẩm nào được bán trong thời gian này</p>
<?php endif ?>