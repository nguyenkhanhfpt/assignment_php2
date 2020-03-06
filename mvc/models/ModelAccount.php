<?php
    class ModelAccount extends Database {

        public function selectAccounts() {
            $select = "SELECT * FROM nguoidung";
            return $this->pdo_query($select);
        }

        public function selectAccount($maNguoiDung) {
            $select = "SELECT * FROM nguoidung WHERE maNguoiDung = ?";
            return $this->pdo_query_one($select, $maNguoiDung);
        }

        public function deleteAcc($maNguoiDung) {
            $delete = "DELETE FROM nguoidung WHERE maNguoiDung = ?";
            $this->pdo_execute($delete, $maNguoiDung);
        }

        public function historyBuyPro($maNguoiDung) {
            $select = "SELECT H.ngayMua, C.soLuongMua, C.soTien, S.*  FROM hoadon AS H 
                        INNER JOIN chitietdonhang AS C ON H.maHoaDon = C.maHoaDon 
                        INNER JOIN sanpham AS S ON C.maSanPham = S.maSanPham 
                        WHERE H.maNguoiDung = ? AND H.trangThai = 1";
            return $this->pdo_query($select, $maNguoiDung);
        }

        public function regexInfo($maNguoiDung, $tenNguoiDung, $soDienThoai, $email, $gioiTinh, $matKhau, $matKhau2) {
            $checkUser = preg_match("/^[a-zA-Z0-9]{5,20}$/", $maNguoiDung);
            $checkFullName = preg_match("/^[^0-9]+$/", $tenNguoiDung);
            $checkPhone = preg_match("/^[0-9]{10,11}$/", $soDienThoai);
            $checkEmail = preg_match("/^[a-zA-Z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+((\.[a-z]+){1,2})$/", $email);
            $checkEmailExist = $this->checkEmailExist($email);
            $checkPass = preg_match("/^[0-9A-Za-z]{6,15}$/", $matKhau); 
            $checkUserExist = $this->checkAccountExist($maNguoiDung);

            if(!$checkUser) {
                return 'Tên đăng nhập không hợp lệ!';
            }
            else if($checkUserExist == 'User already exists') {
                return 'Tên đăng nhập đã tồn tại!';
            }
            else if(!$checkFullName) {
                return 'Họ và tên không hợp lệ!';
            }
            else if(!$checkPhone) {
                return 'Số điện thoại không hợp lệ!';
            }
            else if(!$checkEmail) {
                return 'Email không hợp lệ!';
            }
            else if($checkEmailExist == 'Email already exists') {
                return 'Email đã tồn tại!';
            }
            else if(strlen($gioiTinh) == 0) {
                return 'Giới tính không được để trống!';
            }
            else if(!$checkPass) {
                return 'Mật khẩu không hợp lệ!';
            }
            else if($matKhau != $matKhau2) {
                return 'Mật khẩu xác thực không khớp!';
            }
            else {
                return 'hop le';
            }
        }

        public function insertAccount($maNguoiDung, $tenNguoiDung, $soDienThoai, $email, $diaChi, $gioiTinh, $matKhau) {
            $quyen = 0;
            $anhNguoiDung = 'user.png';
            $matKhau = password_hash($matKhau, PASSWORD_BCRYPT);

            $insert = "INSERT INTO nguoidung VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo_execute($insert, $maNguoiDung, $tenNguoiDung, $email,$soDienThoai, 
            $diaChi,$matKhau, $gioiTinh, $anhNguoiDung, $quyen);

            $_SESSION['maNguoiDung'] = $maNguoiDung;
            $_SESSION['tenNguoiDung'] = $tenNguoiDung;
            $_SESSION['anhNguoiDung'] = $anhNguoiDung;
            $_SESSION['quyen'] = 0;
        }

        public function checkAccountExist($maNguoiDung) {
            $query = "SELECT maNguoiDung FROM nguoidung WHERE maNguoiDung = ?";
            $result = $this->pdo_query_one($query, $maNguoiDung);

            if($result == false) {
                return 'User does not yet exist';
            }
            else {
                return 'User already exists';
            }
        }

        public function checkEmailExist($email){
            $query = "SELECT maNguoiDung FROM nguoidung WHERE email = ?";
            $result = $this->pdo_query_one($query, $email);

            if($result == false) {
                return 'Email does not yet exist';
            }
            else {
                return 'Email already exists';
            }
        }

        public function getInfo($maNguoiDung) {
            $query = "SELECT * FROM nguoidung WHERE maNguoiDung = ?";
            return $this->pdo_query_one($query, $maNguoiDung);
        }

        public function checkLogin($maNguoiDung, $matKhau) {
            $query = "SELECT matKhau FROM nguoidung WHERE maNguoiDung = ?";
            $check = $this->pdo_query_one($query, $maNguoiDung);

            if($check == false) {
                return 'Login false';
            }
            else {
                if(password_verify($matKhau, $check['matKhau'])) {
                    $_SESSION['maNguoiDung'] = $maNguoiDung;
                    $_SESSION['tenNguoiDung'] = $this->getInfo($maNguoiDung)['tenNguoiDung'];
                    $_SESSION['anhNguoiDung'] = $this->getInfo($maNguoiDung)['anhNguoiDung'];
                    $_SESSION['quyen'] = $this->getInfo($maNguoiDung)['quyen'];

                    return 'Success';
                }
                else {
                    return 'Login false';
                }
            }
        }

        public function updateAccount($maNguoiDung, $tenNguoiDung, $soDienThoai, $diaChi, $anhNguoiDung){
            $update = "UPDATE nguoidung SET tenNguoiDung = ?, soDienThoai = ?, diaChi = ?, anhNguoiDung = ? 
                        WHERE maNguoiDung = ?";
            $this->pdo_execute($update, $tenNguoiDung, $soDienThoai, $diaChi, $anhNguoiDung, $maNguoiDung);

            $_SESSION['tenNguoiDung'] = $tenNguoiDung;
            $_SESSION['anhNguoiDung'] = $anhNguoiDung;
        }

        public function checkPassword($maNguoiDung, $matKhau) {
            $passHash = $this->getInfo($maNguoiDung)['matKhau'];

            if(password_verify($matKhau, $passHash)) {
                return true;
            }
            else {
                return false;
            }
        }

        public function checkForgetPass($maNguoiDung, $email) {
            $select = "SELECT * FROM nguoidung WHERE maNguoiDung = ? AND email = ?";
            $result = $this->pdo_query_one($select, $maNguoiDung, $email);
            return $result;
        }

        public function updatePassword($maNguoiDung, $matKhau) {
            $passHash = password_hash($matKhau, PASSWORD_BCRYPT);

            $update = "UPDATE nguoidung SET matKhau = ? WHERE maNguoiDung = ?";
            $this->pdo_execute($update, $passHash, $maNguoiDung);
        }
    }
?>