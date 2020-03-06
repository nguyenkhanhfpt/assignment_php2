<?php
    class Login extends Control{

        public $account;

        public function __construct()
        {
            $this->account = $this->model('ModelAccount');
        }

        public function Default() {
            $this->view('masterLayout', [
                'page' => 'login'
            ]); 
        }

        public function checkLogin() {
            extract($_REQUEST);

            $result = $this->account->checkLogin($maNguoiDung, $matKhau);

            if($result == 'Success') {
                if(isset($saveAccount)) {
                    setcookie("maNguoiDung", $maNguoiDung, time() + 3600 * 24, '/');
                }
                header('Location: ../');
            }
            else {
                $this->view('masterLayout', [
                    'page' => 'login',
                    'err' => 'Đăng nhập thất bại!'
                ]);
            }
        }
    }
?>