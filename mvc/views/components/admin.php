<div class="row">
    <div class="col-7">
        <div class="bg-white p-3">
            <h5>Top các sản phẩm bán chạy theo thời gian</h5>

            <form>
                <div class="form-group d-flex justify-content-end align-items-center">
                    <label class="text-secondary m-0 pr-2" for="">Thống kê theo: </label>
                    <select class="form-control rounded-0 w-20" id="statistical" name="days">
                        <option>---</option>
                        <option value="3">3 ngày</option>
                        <option value="7">1 tuần</option>
                        <option value="14">2 tuần</option>
                        <option value="30">1 tháng</option>
                    </select>
                </div>
            </form>

            <div id="statistical2">
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
            </div>

        </div>

        <form action="<?= $this->url ?>/bill" method="post">
            <input type="submit" class="mt-3 btn btn-outline-primary" value="Tải bản thống kê">
        </form>

    </div>
    <div class="col-5">
        <div class="bg-white p-3">
            <h5>Sản phẩm nhiều người quan tâm</h5>

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Lượt xem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($data['products'] as $product) : ?>
                        <tr>
                            <td scope="row"><span class="font-weight-bold text-primary"><?= $count++ ?></span></td>
                            <td>
                                <img src="<?= $this->url_img . '/' . $product['anhSanPham']; ?>" class="rounded" height="45px" width="45px">
                                <?= $product['tenSanPham'] ?> </td>
                            <td><?= $product['soLuotXem'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>

    </div>
</div>

<script>
    let sort = document.getElementById('statistical');

    sort.onchange = () => {
        value = $("#statistical").val();

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 & this.status == 200) {
                document.getElementById('statistical2').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "<?= $this->url ?>Ajax/statistical/" + value, true);
        xhttp.send();
    }
</script>