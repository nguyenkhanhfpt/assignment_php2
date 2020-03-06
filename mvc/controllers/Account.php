<?php
    class Account extends Control{

        protected $account;
        protected $sendMail;

        public function __construct()
        {
            $this->account = $this->model('ModelAccount');
            $this->sendMail = $this->model('ModelMail');
        }

        public function Default() {
            if(!isset($_SESSION['maNguoiDung'])) {
                header('Location: ./');
            }

            $this->view('masterLayout', [
                'page' => 'account',
                'account' =>  $this->account->selectAccount($_SESSION['maNguoiDung']),
                'historyBuyPro' => $this->account->historyBuyPro($_SESSION['maNguoiDung'])
            ]);
        }

        public function updateProfile() {
            extract($_REQUEST);
            $anhNguoiDung = strlen($_FILES['anhNguoiDung']['name']) ? $this->upload_file('anhNguoiDung', $this->url_img) : $anhCu;
            $this->account->updateAccount($_SESSION['maNguoiDung'], $tenNguoiDung, $soDienThoai, $diaChi, $anhNguoiDung);

            header('Location: ./');
        }

        public function updatePassword() {
            extract($_REQUEST);

            $checkOldPass = $this->account->checkPassword($_SESSION['maNguoiDung'], $matKhau);

            if($checkOldPass) {
                $this->account->updatePassword($_SESSION['maNguoiDung'], $matKhauMoi);

                $this->view('masterLayout', [
                    'page' => 'account',
                    'account' =>  $this->account->selectAccount($_SESSION['maNguoiDung']),
                    'historyBuyPro' => $this->account->historyBuyPro($_SESSION['maNguoiDung']),
                    'success' => 'Đổi mật khẩu thành công!'
                ]);
            }
            else {
                echo "<script>alert('Mật khẩu cũ không chính xác!')</script>";
                echo "<script>history.back()</script>";
            }

        }

        public function forgetPass() {
            $this->view('masterLayout', [
                'page' => 'forgetPass'
            ]);
        }

        public function checkForgetPass() {
            extract($_REQUEST);
            $check = $this->account->checkForgetPass($maNguoiDung, $email);

            if($check == false) {
                $this->view('masterLayout', [
                    'page' => 'forgetPass', 
                    'err' => 'Tên đăng nhập hoặc email không đúng!'
                ]);
            }
            else {
                $this->view('masterLayout', [
                    'page' => 'forgetPass', 
                    'success' => 'Mật khẩu mới đã được gửi vào email!'
                ]);
                
                $newPass = rand(100000, 9999999999);
                $this->account->updatePassword($maNguoiDung, $newPass);

                $to = $email;
                $subject = "Lấy lại mật khẩu";
                $body = "Mật khẩu mới của bạn là: <b style='color: red; font-size: 23px'>$newPass</b>, bạn hãy đăng nhập và nên đổi lại mật khẩu để đảm bảo an toàn và dễ nhớ hơn";
                $this->sendMail->sendMail($to, $subject, $body);
            }
        } 

        public function logout() {
            unset($_SESSION['maNguoiDung']);
            unset($_SESSION['tenNguoiDung']);
            unset($_SESSION['anhNguoiDung']);
            unset($_SESSION['quyen']);
            $_SESSION['cart'] = [];

            setcookie("maNguoiDung", "", time() - 3600, "/");

            header('Location: ../ ');
        }
    }
?>