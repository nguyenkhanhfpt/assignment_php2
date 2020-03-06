<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="<?=$this->url_css?>/bootstrap.min.css">
    <script src="<?= $this->url_js ?>/jquery-3.4.1.min.js"></script>
    <script src="<?= $this->url_js ?>/popper.min.js"></script>
    <script src="<?= $this->url_js ?>/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="<?=$this->url_css?>/main.css">
    <link rel="stylesheet" href="<?=$this->url_css?>/admin.css">
    <link rel="stylesheet" href="<?=$this->url_css?>/all.css">
</head>

<body>
    <div class="d-flex admin-main">
        <div class="admin-menu">
            <div class="admin-logo">
                <a href="<?=$this->url?>">K-Tech</a>
            </div>
            <div class="menu-item">
                <ul class="list-group">
                    <li class="list-group-item">
                        <img src="<?=$this->url_img?>/report.png" width="20px">
                        <a href="<?=$this->url_admin?>">Thống kê</a>
                    </li>
                    <li class="list-group-item">
                        <img src="<?=$this->url_img?>/conveyor.png" width="20px">
                        <a href="<?=$this->url_admin?>/factory">Thương hiệu</a>
                    </li>
                    <li class="list-group-item">
                        <img src="<?=$this->url_img?>/phone.png" width="20px">
                        <a href="<?=$this->url_admin?>/products">Sản phẩm</a>
                    </li>
                    <li class="list-group-item">
                    <img src="<?=$this->url_img?>/customer.svg" width="20px">
                        <a href="<?=$this->url_admin?>/customers">Người dùng</a>
                    </li>
                    <li class="list-group-item">
                        <img src="<?=$this->url_img?>/bill.svg" width="20px">
                        <a href="<?=$this->url_admin?>/bill">Đơn hàng</a>
                    </li>
                    <li class="list-group-item">
                        <img src="<?=$this->url_img?>/comment.png" width="20px">
                        <a href="<?=$this->url_admin?>/comments">Bình luận</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="admin-content">
            <div class="admin-account">
            </div>
            <div class="content-main">
                <?php require './mvc/views/components/' .$data['page'] . '.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>