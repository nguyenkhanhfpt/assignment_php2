<?php
    class Register extends Control{

        protected $account;

        public function __construct()
        {
            $this->account = $this->model('ModelAccount');
        }

        public function Default() {
            $this->view('masterLayout', [
                'page' => 'register'
            ]);
        }

        public function createNew() {
            extract($_REQUEST);

            if(!isset($gioiTinh)) {
                $gioiTinh = '';
            }

            $checkInput = $this->account->regexInfo($maNguoiDung, $tenNguoiDung, $soDienThoai, $email, $gioiTinh, $matKhau, $matKhau2);

            if($checkInput != 'hop le') {
                $this->view('masterLayout', [
                    'page' => 'register', 
                    'err' => $checkInput
                ]);
                return;
            }
            else {
                if(isset($saveAccount)) {
                    setcookie("maNguoiDung", $maNguoiDung, time() + 3600 * 24, '/');
                }
                
                $this->view('masterLayout', [
                    'page' => 'register', 
                    'success' => 'Đăng ký thành công!'
                ]);

                $this->account->insertAccount($maNguoiDung, $tenNguoiDung, $soDienThoai, $email, $diaChi,$gioiTinh, $matKhau);
                return; 
            }
        }
    }
?>