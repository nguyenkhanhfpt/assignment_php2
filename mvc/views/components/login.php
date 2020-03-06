<div class="container mb-5" style="min-height: 350px">
    <h2 class="text-center my-3 mt-5">Đăng nhập</h2>

    <?php if(isset($data['err'])): ?>
        <p class="text-danger text-center"><?= $data['err'] ?></p>
    <?php endif ?>

    <form class="w-50 mx-auto form" action="<?=$this->url_login?>/checkLogin" method="POST">
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" placeholder="Enter your account" name="maNguoiDung" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input type="password" class="form-control" placeholder="Password" name="matKhau" required>
        </div>
        <div class="form-group form-check custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="saveAccount" id="save-info">
            <label class="custom-control-label" for="save-info">Lưu mật khẩu</label>
            <span class="small d-block float-md-right">Quên mật khẩu? Nhấn vào <a href="<?=$this->url_account?>/forgetPass">đây</a></span>
        </div>
        
        <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>