<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if (isset($data['product']['tenSanPham'])) : ?>
        <title>K-Tech - <?= $data['product']['tenSanPham'] ?></title>
        <meta property="og:title" content="K-Tech - <?= $data['product']['tenSanPham'] ?>" />
    <?php else :  ?>
        <title>K-Tech - Cửa hàng điện thoại chính hãng</title>
        <meta property="og:title" content="K-Tech - Cửa hàng điện thoại chính hãng" />
    <?php endif ?>

    <link rel="icon" href="<?= $this->url_img ?>/logo.png" type="image/x-icon">
    <meta name="description" content="K-Tech là cửa hàng bán lẽ điện thoại chính hãng, smartphone, với giá cả ưu đãi" />


    <meta property="og:description" content="K-Tech là cửa hàng bán lẽ điện thoại chính hãng, smartphone, với giá cả ưu đãi" />
    <meta property="og:site_name" content="K-Tech - Cửa hàng điện thoại chính hãng" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:image" content="<?= $this->url_img ?>/photo4.jpg" />
    <meta name="keywords" content="điện thoại, smartphone, iphone, samsung, oppo, điện thoại giá rẻ, dien thoai" />

    <!-- Link Jquery and Boostrap -->
    <link rel="stylesheet" href="<?= $this->url_css ?>/bootstrap.min.css">
    <script src="<?= $this->url_js ?>/jquery-3.4.1.min.js"></script>
    <script src="<?= $this->url_js ?>/popper.min.js"></script>
    <script src="<?= $this->url_js ?>/bootstrap.min.js"></script>

    <!-- MA5 Slider-->
    <script src="<?= $this->url_js ?>/jquery-ui.min.js"></script>
    <link href="<?= $this->url_css ?>/ma5slider.min.css" rel="stylesheet" type="text/css">
    <script src="<?= $this->url_js ?>/ma5slider.min.js"></script>
    <script>
        $(window).on('load', function() {
            $('.ma5slider').ma5slider();
        });
    </script>

    <!-- link owl-carousel  -->
    <link href="<?= $this->url_css ?>/owl.carousel.css" rel="stylesheet">

    <!-- link css -->
    <link rel="stylesheet" href="<?= $this->url_css ?>/main.css">
    <link rel="stylesheet" href="<?= $this->url_css ?>/all.css">
    <link rel="stylesheet" href="<?= $this->url_css ?>/custom.css">

</head>

<body onload="loaddingWeb()">
    <div id="loadding">
    </div>

    <?php require './mvc/views/components/menu.php'; ?>

    <?php require './mvc/views/components/' . $data['page'] . '.php'; ?>

    <?php require './mvc/views/components/footer.php'; ?>

    <div id="stop" class="scrollTop d-none d-md-block">
        <a href=""><i class="fa fa-angle-double-up text-white"></i></a>
    </div>
    <script src="<?= $this->url_js ?>/scroll.js"></script>


    <script src="<?= $this->url_js ?>/owl.carousel.js"></script>
    <script src="<?= $this->url_js ?>/owlCarousel.js"></script>

    <!-- Ajax all page and menu -->
    <script src="<?= $this->url_js ?>/menu.js"></script>
    <script>
        const btn_searchProduct = document.getElementById('formSearch');

        btn_searchProduct.addEventListener('keyup', searchProductsAjax);

        function searchProductsAjax() {
            let value = this.value;

            $.ajax({
                url: "<?= $this->url ?>Ajax/content/" + value,
                success: function(result) {
                    $("#content").html(result);
                }
            });
        }
    </script>


    <!-- link sweetalert -->
    <script src="<?= $this->url_js ?>/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.btn-addcart').each(function() {
            var nameProduct = $(this).parent().find('.product-title').html();
            let idProduct = $(this).parent().find('.product-id').html();

            $(this).on('click', function() {
                $.ajax({
                    url: "<?= $this->url ?>Ajax/checkQuantityPro/" + idProduct,
                    success: function(number) {
                        if (number > 0) {
                            swal(nameProduct, "Đã được thêm vào giỏ hàng !", "success");
                            $.ajax({
                                url: "<?= $this->url ?>Ajax/addCart/" + idProduct,
                                success: function(result) {
                                    $("#countCart").html(result);
                                }
                            });

                        } else {
                            swal(nameProduct, "Sản phẩm tạm không đủ để bạn mua !", "error");
                        }
                    }
                });
            });
        });
    </script>

    <script src="<?= $this->url_js ?>/loadding.js"></script>

    <!-- tooltip boostrap -->
    <script>
        $('.btn-addcart').tooltip({
            boundary: 'window'
        })
    </script>
</body>

</html>