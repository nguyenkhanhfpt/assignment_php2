<nav class="nav">
    <div class="container">
        <div class="d-flex justify-content-end nav-top mb-md-2">
            <a href="<?= $this->url_pro ?>">Sản phẩm</a>
            <a href="">Giới thiệu</a>
            <?php if (isset($_SESSION['maNguoiDung'])) : ?>
                <a class="dropdown-toggle ml-4" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['tenNguoiDung'] ?>
                    <img src="<?= $this->url_img . '/' . $_SESSION['anhNguoiDung'] ?>" class="rounded-circle" width="25px" height="25px">
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item m-0 text-dark" href="<?= $this->url_account ?>">
                        <i class="far fa-user-cog"></i>
                        Thông tin
                    </a>
                    <?php if ($_SESSION['quyen'] > 0) : ?>
                        <a class="dropdown-item m-0 text-dark" href="<?= $this->url_admin ?>">
                            <i class="fal fa-cog"></i>
                            Quản lý
                        </a>
                    <?php endif ?>
                    <a class="dropdown-item m-0 text-danger" href="<?= $this->url_account ?>/logout">
                        <i class="fal fa-sign-out-alt"></i>
                        Đăng xuất
                    </a>
                </div>
            <?php else : ?>
                <a href="<?= $this->url_register ?>">Đăng ký</a>
                <a href="<?= $this->url_login ?>">Đăng nhập</a>
            <?php endif ?>
        </div>
        <div class="d-flex justify-content-between align-items-baseline">
            <div class="d-flex align-items-center logo">
                <div id="bars" class="d-inline d-md-none menu-mobel">
                    <i class="fal fa-bars"></i>
                </div>
                <h2 class="mb-0"><a href="<?= $this->url ?>" class="text-decoration-none text-white">K-Tech</a></h2>
            </div>
            <div class="form-group has-search">
                <form action="" class="position-relative">
                    <i class="far fa-search form-control-feedback"></i>
                    <input type="text" class="form-control" id="formSearch" placeholder="Search">

                    <div id="content" class="position-absolute w-100 bg-white rounded" style="z-index: 10">

                    </div>
                </form>
            </div>
            <div class="cart mr-3 mr-sm-5">
                <a href="<?= $this->url_cart ?>" class="d-inline mr-3 text-decoration-none position-relative">
                    <i class="fal fa-shopping-cart text-white m-0"></i>
                    <span class="numCart"><?=count($_SESSION['cart'])?></span>
                </a>
                <?php if (isset($_SESSION['maNguoiDung'])) : ?>
                    <a href="<?= $this->url_cart ?>" class="d-inline d-sm-none" id="dropdownMenuLinkMobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fal fa-user text-white" style="font-size: 16px;"></i>
                    </a>
                <?php endif ?>

                <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLinkMobile">
                    <a class="dropdown-item m-0 text-dark" href="<?= $this->url_account ?>">
                        <i class="far fa-user-cog"></i>
                        Thông tin
                    </a>
                    <?php if ($_SESSION['quyen'] > 0) : ?>
                        <a class="dropdown-item m-0 text-dark" href="<?= $this->url_admin ?>">
                            <i class="fal fa-cog"></i>
                            Quản lý
                        </a>
                    <?php endif ?>
                    <a class="dropdown-item m-0 text-danger" href="<?= $this->url_account ?>/logout">
                        <i class="fal fa-sign-out-alt"></i>
                        Đăng xuất
                    </a>
                </div>

            </div>
        </div>
    </div>
</nav>

<div id="list-menu-bars" class="list-menu-bars">
    <i id="closeBars" class="fal fa-times"></i>
    <div class="container" style="margin-top: 7rem">
        <div class="px-4 d-flex flex-column justify-content-end mb-md-2">
            <div class="box-link-menu">
                <a href="<?= $this->url ?>/products">Sản phẩm</a>
            </div>
            <div class="box-link-menu">
                <a href="">Giới thiệu</a>
            </div>
            <?php if (!isset($_SESSION['maNguoiDung'])) : ?>
                <div class="box-link-menu">
                    <a href="<?= $this->url_register ?>">Đăng ký</a>
                </div>
                <div class="box-link-menu">
                    <a href="<?= $this->url_login ?>">Đăng nhập</a>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>