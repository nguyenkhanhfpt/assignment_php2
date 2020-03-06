<?php
    class AdminHanding extends Control{

        protected $product;
        protected $infoPro;
        protected $factory;
        protected $account;
        protected $comment;
        protected $bill;

        public function __construct()
        {
            $this->product = $this->model('ModelProduct');
            $this->infoPro = $this->model('ModelInfoPro');
            $this->factory = $this->model('ModelFactory');
            $this->account = $this->model('ModelAccount');
            $this->comment = $this->model('ModelComment');
            $this->bill = $this->model('ModelBill');
        }

        public function Default() {
            header('Location: ../admin');
        }

        public function newProduct()
        {
            extract($_REQUEST);
            $anhSanPham = $this->upload_file('anhSanPham', $this->url_img);
            $maSanPham = preg_replace("/[ \/]/", '-', strtolower($tenSanPham));

            $this->product->insertNewProduct($maSanPham, $mathuongHieu, $tenSanPham , 
            $giaSanPham, $giamGia, $soLuong, $anhSanPham, 0);

            $this->infoPro->insertDetailPro($maSanPham, $manHinh, $camera, $ram, $boNho, $heDieuHanh, $chip);

            header('Location: ../admin/products');
        }

        public function deleteProduct($maSanPham) {
            extract($_REQUEST);
            $this->product->deleteProduct($maSanPham);

            header('Location: ../../admin/products');
        }

        public function editProduct() {
            extract($_REQUEST);

            if(strlen($_FILES['anhSanPham']['name']) == 0) {
                $anhSanPham = $anhSanPhamCu;
            }   
            else {
                $anhSanPham = $this->upload_file('anhSanPham', $this->url_img);
            }

            $this->product->updateProduct($maSanPham, $mathuongHieu, $tenSanPham , $giaSanPham, $giamGia, $soLuong, $anhSanPham);
            $this->infoPro->updateDetailPro($maSanPham, $manHinh, $camera, $ram, $boNho, $heDieuHanh, $chip);

            $this->view('adminLayout', [
                "page" => 'adminEditPro',
                'factory' => $this->factory->selectAllFactory(),
                'product' => $this->product->selectProduct($maSanPham),
                'success' => 'Cập nhật thành công!'
            ]);
        }

        public function newFactory() {
            extract($_REQUEST);
            $anhThuongHieu = $this->upload_file('anhThuongHieu', $this->url_img);

            $this->factory->inserNewFactory($maThuongHieu, $tenThuongHieu, $anhThuongHieu);

            header('Location: ../admin/factory');
        }

        public function deleteFactory($maThuongHieu) {
            extract($_REQUEST);
            $this->factory->deleteFactory($maThuongHieu);
            
            header('Location: ../../admin/factory');
        }

        public function editFactory() {
            extract($_REQUEST);

            if(strlen($_FILES['anhThuongHieu']['name']) == 0) {
                $anhThuongHieu = $anhThuongHieuCu;
            }
            else {
                $anhThuongHieu = $this->upload_file('anhThuongHieu', $this->url_img);
            }

            $this->factory->updateFactory($maThuongHieu, $tenThuongHieu, $anhThuongHieu);

            $this->view('adminLayout', [
                "page" => 'adminEditFactory',
                'factory' => $this->factory->selectFactory($maThuongHieu),
                'success' => 'Thay đổi thành công!'
            ]);
        }

        public function deleteAccount($maNguoiDung) {
            $this->account->deleteAcc($maNguoiDung);
            header('Location: ../../admin/customers');
        }

        public function deleteBill($maHoaDon) {
            $this->bill->deleteBill($maHoaDon);
            header('Location: ../../admin/bill');
        }

        public function deleteComment($maBinhLuan) {
            $this->comment->deleteComment($maBinhLuan);
            echo "<script>history.back()</script>";
        }
    }
?>