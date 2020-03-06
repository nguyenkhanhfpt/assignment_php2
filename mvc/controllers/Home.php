<?php
    class Home extends Control{

        protected $home;
        protected $product;
        protected $factory;
        protected $account;
        
        public function __construct()
        {
            $this->home = $this->model('ModelHome');
            $this->product = $this->model('ModelProduct');
            $this->factory = $this->model('ModelFactory');
            $this->account = $this->model("ModelAccount");

            if(isset($_COOKIE['maNguoiDung'])) {
                $_SESSION['maNguoiDung'] = $_COOKIE['maNguoiDung'];
                $_SESSION['tenNguoiDung'] = $this->account->getInfo($_COOKIE['maNguoiDung'])['tenNguoiDung'];
                $_SESSION['anhNguoiDung'] = $this->account->getInfo($_COOKIE['maNguoiDung'])['anhNguoiDung'];
                $_SESSION['quyen'] = $this->account->getInfo($_COOKIE['maNguoiDung'])['quyen'];
            }
        }

        public function Default() {
            $this->view('masterLayout', [
                'page' => 'home',
                'products' => $this->product->selectAllProductsHome(), 
                'productsSale' => $this->product->selectSaleProductsHome(),
                'productsView' => $this->product->selectViewProductsHome(),
                'factory' => $this->factory->selectAllFactory()
            ]);
        }
    }
?>