<?php
    class Admin extends Control {

        protected $product;
        protected $factory;
        protected $bill;
        protected $detailBill;
        protected $account;
        protected $comment;

        public function __construct()
        {
            $this->product = $this->model('ModelProduct');
            $this->factory = $this->model('ModelFactory');
            $this->bill = $this->model('ModelBill');
            $this->detailBill = $this->model('ModelDetailBill');
            $this->account = $this->model('ModelAccount');
            $this->comment = $this->model('ModelComment');

            if(($_SESSION['quyen'] == 0)) {
                header('Location: ./ ');
            }
        }

        public function Default() {
            $this->view('adminLayout', [
                'page' => 'admin',
                'products' => $this->product->selectProView(),
                'topBuyPro' => $this->bill->selectTopBuyProDays()
            ]);
        }

        public function products() {
            $this->view('adminLayout', [
                "page" => 'adminProducts',
                "products" => $this->product->selectAllProducts()
            ]);
        }

        public function viewNewPro() {
            $this->view('adminLayout', [
                "page" => 'viewCreatePro',
                'factory' => $this->factory->selectAllFactory()
            ]);
        }

        public function editProduct($maSanPham) {
            $this->view('adminLayout', [
                "page" => 'adminEditPro',
                'factory' => $this->factory->selectAllFactory(),
                'product' => $this->product->selectProduct($maSanPham)
            ]);
        }

        public function factory() {
            $this->view('adminLayout', [
                "page" => 'adminFactory',
                'factory' => $this->factory->selectAllFactory()
            ]);
        }

        public function editFactory($maThuongHieu) {
            $this->view('adminLayout', [
                "page" => 'adminEditFactory',
                'factory' => $this->factory->selectFactory($maThuongHieu)
            ]);
        }

        public function customers() {
            $this->view('adminLayout', [
                "page" => 'adminCustomer',
                'customers' => $this->account->selectAccounts()
            ]);
        }

        public function detailAccount($maNguoiDung) {
            $this->view('adminLayout', [
                "page" => 'detailCustomer',
                'customer' => $this->account->selectAccount($maNguoiDung),
                'history' => $this->account->historyBuyPro($maNguoiDung)
            ]);
        }

        public function bill() {
            $this->view('adminLayout', [
                'page' => 'adminBill', 
                'newBill' => $this->bill->selectNewBill(),
                'oldBill' => $this->bill->selectOldBill()
            ]);
        }

        public function detailBill($maHoaDon) {
            $this->view('adminLayout', [
                'page' => 'detailBill',
                'detailBill' => $this->bill->viewDetailBill($maHoaDon), 
                'products' => $this->detailBill->selectProInBill($maHoaDon),
                'sumPriceBill' => $this->detailBill->sumBill($maHoaDon)
            ]);
        }

        public function ship($maHoaDon) {
            $this->bill->ship($maHoaDon);
            $products = $this->detailBill->selectProInBill($maHoaDon);

            foreach($products as $product) {
                $this->product->updateNumPro($product['maSanPham'], $product['soLuongMua']);
            }

            $this->view('adminLayout', [
                'page' => 'detailBill',
                'detailBill' => $this->bill->viewDetailBill($maHoaDon), 
                'products' => $this->detailBill->selectProInBill($maHoaDon),
                'sumPriceBill' => $this->detailBill->sumBill($maHoaDon),
                'success' => 'Giao hàng thành công'
            ]);
        }

        public function comments() {
            $this->view('adminLayout', [
                'page' => 'comment', 
                'statisticalComemnts' => $this->comment->statisticalComemnts()
            ]);
        }

        public function commentProduct($maSanPham) {
            $this->view('adminLayout', [
                'page' => 'viewComment', 
                'comments' => $this->comment->selectComment($maSanPham),
                'product' => $this->product->selectProduct($maSanPham)
            ]);
        }


    }
?>  