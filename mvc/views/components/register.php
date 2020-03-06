<div class="container mb-5">
    <h2 class="text-center my-3">Đăng ký tài khoản</h2>

    <?php if (isset($data['err'])) : ?>
        <p class="text-danger text-center"><?= $data['err'] ?></p>
    <?php endif ?>

    <?php if (isset($data['success'])) : ?>
        <p class="text-success text-center"><?= $data['success'] ?></p>
    <?php endif ?>

    <form class="w-50 mx-auto form" action="<?= $this->url_register ?>/createNew" method="POST" onsubmit="return checkPassword()">

        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" placeholder="Enter your account" name="maNguoiDung" id="userName">
            <small id="checkNameExits" class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" class="form-control" placeholder="Your name" name="tenNguoiDung">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="tel" class="form-control" placeholder="Phone number" name="soDienThoai">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Your email" name="email">
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" placeholder="Your address" name="diaChi">
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <div class="row">
                <div class="col">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="gioiTinh" value="Nam" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Nam</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="gioiTinh" value="Nữ" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Nữ</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" id="pass1" class="form-control" placeholder="Password" name="matKhau">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" id="pass2" class="form-control" placeholder="Password again" name="matKhau2">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group form-check custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="saveAccount" id="save-info">
            <label class="custom-control-label" for="save-info">Lưu mật khẩu</label>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Đăng ký</button>
    </form>
</div>


<script>
    const userName = document.getElementById('userName');

    userName.addEventListener('keyup', function() {
        name = this.value;

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 & this.status == 200) {
                document.getElementById('checkNameExits').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "<?=$this->url?>Ajax/checkName/" + name, true);
        xhttp.send();
    })

    function checkPassword() {
        let pass1 = document.getElementById('pass1').value;
        let pass2 = document.getElementById('pass2').value;

        if (pass2 !== pass1) {
            alert('Mật khẩu xác nhận không khớp');
            return false;
        } else {
            return true;
        }
    }
</script>