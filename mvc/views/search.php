<?php if(strlen($data['key'])) : ?>
    <p class="px-3 py-2 mb-0">Tìm sản phẩm: "<?=$data['key']?>"</p>
<?php endif ?>


<?php foreach($data['data'] as $item) : ?>
    <a class="p-3 d-block text-dark text-decoration-none d-flex" href="<?=$this->url_pro?>/viewProduct/<?=$item['maSanPham']?>">
        <img src="<?=$this->url_img .'/'. $item['anhSanPham']?>" class="mr-1" width="28px">
        <div class="ml-1">
            <p class="mb-0" style="line-height: 18px;"><?=$item['tenSanPham']?></p>
            <span class="small text-danger">
                <?= number_format($item['giaSanPham'] - $item['giaSanPham'] / 100 * $item['giamGia']) ?> đ
            </span>
        </div> 
    </a>
<?php endforeach ?>