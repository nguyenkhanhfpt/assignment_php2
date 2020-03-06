<?php
    class ModelCart{

        public function addProductCart($maSanPham, $tenSanPham, $anhSanPham, $giaSanPham, $soLuong) {

            if(isset($_SESSION['cart'][$maSanPham])) {
                $_SESSION['cart'][$maSanPham]['soLuong'] += $soLuong;
                return;
            }

            $item = [
                'tenSanPham' => $tenSanPham,
                'anhSanPham' => $anhSanPham,
                'giaSanPham' => $giaSanPham,
                'soLuong' => $soLuong
            ];

            $_SESSION['cart'][$maSanPham] = $item;
        }

        public function deleteCart($key) {
            unset($_SESSION['cart'][$key]);
        }   

        public function sum() {
            $sum = 0;
            foreach($_SESSION['cart'] as $key => $product) {
                $sum += $product['giaSanPham'] * $product['soLuong'];
            }
            return $sum;
        }
    }
?>