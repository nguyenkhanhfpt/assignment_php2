<?php
    class Ajax extends Control{

        protected $product;
        protected $bill;
        protected $account;

        function __construct()
        {
            $this->product = $this->model('ModelProduct');
            $this->bill = $this->model('ModelBill');
            $this->account = $this->model('ModelAccount');
        }

        public function content($value) {
            $data = $this->product->searchProduct($value);
            
            $this->view('search', [
                "key" => $value,
                "data" => $data
            ]);
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