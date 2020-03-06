<div class="container mb-5" style="min-height: 350px;">
    <h2 class="text-center my-3 mt-5">Quên mật khẩu</h2>

    <?php if (isset($data['err'])) : ?>
        <p class="text-danger text-center"><?= $data['err'] ?></p>
    <?php endif ?>

    <?php if (isset($data['success'])) : ?>
        <p class="text-success text-center"><?= $data['success'] ?></p>
    <?php endif ?>

    <form class="w-50 mx-auto form" action="<?= $this->url_account ?>/checkForgetPass" method="POST">
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" placeholder="Enter your account" name="maNguoiDung" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-group form-check custom-control p-0">
            <a href="<?=$this->url_login?>" class="text-primary text-decoration-none float-left">Trở lại đăng nhập</a>
        </div>

        <button type="submit" name="forgetPass" class="btn btn-primary">Xác nhận</button>
    </form>
</div>