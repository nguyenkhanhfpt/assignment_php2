<?php
    class Products extends Control{

        protected $product;
        protected $infoPro;
        protected $factory;
        protected $comment;

        public function __construct()
        {
            $this->product = $this->model('ModelProduct');
            $this->infoPro = $this->model('ModelInfoPro');
            $this->factory = $this->model('ModelFactory');
            $this->comment = $this->model('ModelComment');
        }

        public function Default() {
            if(isset($_POST['sort'])) {
                $this->view('masterLayout', [
                    'page' => 'products', 
                    'products' => $this->product->sortProducts($_POST['sort']),
                    'factory' => $this->factory->countProFactory(),
                    'topPro' => $this->product->selectProView()
                ]);
            }
            else {
                $this->view('masterLayout', [
                    'page' => 'products',
                    'products' => $this->product->selectLimitProducts(),
                    'displayViewMore' => true,
                    'numEndViewMore' => $this->product->numEnd, 
                    'factory' => $this->factory->countProFactory(),
                    'topPro' => $this->product->selectProView()
                ]);
            }
        }

        public function filter($maThuongHieu) {
            if(isset($_POST['sort'])) {
                $this->view('masterLayout', [
                    'page' => 'products',
                    'products' => $this->product->sortProFactory($maThuongHieu, $_POST['sort']),
                    'factory' => $this->factory->countProFactory(),
                    'topPro' => $this->product->selectProView()
                ]);
            }
            else {
                $this->view('masterLayout', [
                    'page' => 'products',
                    'products' => $this->product->selectProFactory($maThuongHieu),
                    'factory' => $this->factory->countProFactory(),
                    'topPro' => $this->product->selectProView()
                ]);
            }
        }

        public function viewProduct($maSanPham) {
            $this->product->updateViewPro($maSanPham);
            
            $product = $this->product->selectOneProduct($maSanPham);
            $this->view('masterLayout', [
                'page' => 'viewProduct',
                'product' => $product,
                'products' => $this->product->selectProductsSame($product['maThuongHieu']),
                'infoPro' => $this->infoPro->selectInfoPro($maSanPham),
                'comments' => $this->comment->selectComment($maSanPham)
            ]);
        }

        public function comment() {
            extract($_REQUEST);

            if(!isset($_SESSION['maNguoiDung'])) {
                echo "<script>alert('Đăng nhập để bình luận!')</script>";
                echo "<script>history.back()</script>";
            }
            else {
                $this->comment->insertNewComment($maNguoiDungBinhLuan, $noiDung, $maSanPham);
                header("Location: ./viewProduct/" .$maSanPham );
            }
        }

        public function deleteComment($maBinhLuan) {
            $this->comment->deleteComment2($maBinhLuan, $_SESSION['maNguoiDung']);
            echo "<script>history.back();</script>";
        }
    }
?>