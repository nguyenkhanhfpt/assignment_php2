<?php
    class Ajax extends Control{

        protected $product;
        protected $bill;
        protected $account;
        protected $cart;

        function __construct()
        {
            $this->product = $this->model('ModelProduct');
            $this->bill = $this->model('ModelBill');
            $this->account = $this->model('ModelAccount');
            $this->cart = $this->model('ModelCart');
        }

        public function content($value) {
            $data = $this->product->searchProduct($value);
            
            $this->view('search', [
                "key" => $value,
                "data" => $data
            ]);
        }

        public function checkQuantityPro($maSanPham) {
            $getQuantity = $this->product->selectOneProduct($maSanPham)['soLuong'];
            echo $getQuantity;
        }

        public function addCart($maSanPham) {
            $getInfo = $this->product->selectOneProduct($maSanPham);
            $tenSanPham = $getInfo['tenSanPham'];
            $anhSanPham = $getInfo['anhSanPham'];
            $giaSanPham = $getInfo['giaSanPham'] - $getInfo['giaSanPham'] / 100 * $getInfo['giamGia'];
            $this->cart->addProductCart($maSanPham, $tenSanPham, $anhSanPham, $giaSanPham, 1);
            echo count($_SESSION['cart']);
        }

        public function products($value) {
            $this->view('ajaxViewMoreProduct', [
                "products" => $this->product->selectLimitProducts($value)
            ]);
        }

        public function statistical($days) {
            $this->view('ajaxStatistical', [
                'topBuyPro' => $this->bill->selectTopBuyProDays($days)
            ]);
        }

        public function checkName($name) {
            $result = $this->account->checkAccountExist($name);

            if($result == 'User already exists') {
                echo 'Tên người dùng đã tồn tại!';
            }
        }
    }
?>