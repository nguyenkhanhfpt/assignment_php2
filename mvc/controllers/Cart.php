<?php
    class Cart extends Control{

        protected $cart;
        protected $product;
        protected $bill;
        protected $detailBill;
        protected $sendMail;
        protected $account;

        public function __construct()
        {
            $this->cart = $this->model('ModelCart');
            $this->product = $this->model('ModelProduct');
            $this->bill = $this->model('ModelBill');
            $this->detailBill = $this->model('ModelDetailBill');
            $this->sendMail = $this->model('ModelMail');
            $this->account = $this->model('modelAccount');
        }

        public function Default() {
            $this->view('masterLayout', [
                'page' => 'cart',
                'sum' => $this->cart->sum()
            ]);
        }

        public function addCart() {
            extract($_REQUEST);
            $numProInData = $this->product->selectOneProduct($maSanPham)['soLuong'];

            if($soLuong <= $numProInData) {
                $this->cart->addProductCart($maSanPham, $tenSanPham, $anhSanPham, $giaSanPham, $soLuong);
                echo "<script>history.back()</script>";
            }
            else {
                echo "<script>alert('Số lượng sản phẩm không đủ!')</script>";
                echo "<script>history.back()</script>";
            } 
        }

        public function deleteItem($maSanPham){
            $this->cart->deleteCart($maSanPham);

            echo "<script>history.back()</script>";
        }

        public function updateCart() {
            extract($_REQUEST);
            $err = 0;
            foreach($soLuong as $key => $num) {
                $numProInData = $this->product->selectOneProduct($key)['soLuong'];
                if($num <= $numProInData){
                    $_SESSION['cart'][$key]['soLuong'] = $num;
                }
                else {
                    $err++;
                    continue;
                }
            }

            if($err > 0) {
                header('Location: ./err');
            }
            else {
                header('Location: ./');
            }
        }

        public function err() {
            $this->view('masterLayout', [
                'page' => 'cart',
                'err' => 'Sản phẩm trong kho không đủ',
                'sum' => $this->cart->sum()
            ]);
        }

        public function pay() {
            if(isset($_SESSION['maNguoiDung'])) {
                $maHoaDon = $this->bill->randomIdBill();

                $this->bill->createNewBill($maHoaDon, $_SESSION['maNguoiDung']);

                $body = "<h3 style='color: black'>Cảm ơn bạn đã đạt hàng, dưới đây là thông tin đơn hàng bạn đã đặt: </h3> 
                        <table border='1' style='border-collapse: collapse; text-align: center'><tr>
                        <th>Tên sản phẩm</th><th>Số lượng mua</th><th>Thành tiền</th><tr>";
                $sum = 0;
                foreach($_SESSION['cart'] as $key => $item) {
                    $soTien = $item['soLuong'] * $item['giaSanPham'];
                    $this->detailBill->createNewDetailBill($maHoaDon, $key, $item['soLuong'], $soTien);

                    $body .= "<tr><td style='padding: 5px' >" .$item['tenSanPham'] ."</td><td style='padding: 5px' >" .$item['soLuong']. "</td><td style='padding: 5px'>" .number_format($soTien). " đ</td></tr>";
                    $sum += $soTien;
                }
                $_SESSION['cart'] = [];
                $sum = number_format($sum);

                $body .= "</table> <h3>Tổng số tiền thanh toán là: <span style='color: red'>$sum</span> vnđ</h3>";
                $to = $this->account->getInfo($_SESSION['maNguoiDung'])['email'];
                $subject = 'Thông tin đơn hàng ngày ' .date('d-m-Y', time());

                $this->sendMail->sendMail($to, $subject, $body);

                header('Location: ./');
            }
            else {
                $this->view('masterLayout', [
                    'page' => 'cart',
                    'err' => 'Đăng nhập để mua hàng!',
                    'sum' => $this->cart->sum()
                ]);
            }
        }
    }
?>