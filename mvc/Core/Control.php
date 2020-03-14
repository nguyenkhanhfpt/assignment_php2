<?php
    class Control{

        public $url = '/khanhnpd02983_as2/';
        public $url_pro = '/khanhnpd02983_as2/products';
        public $url_cart = '/khanhnpd02983_as2/cart';
        public $url_account = '/khanhnpd02983_as2/account';
        public $url_register = '/khanhnpd02983_as2/register';
        public $url_login = '/khanhnpd02983_as2/login';
        public $url_admin = '/khanhnpd02983_as2/admin';
        public $url_admin_handing = '/khanhnpd02983_as2/AdminHanding';
        public $url_js = '/khanhnpd02983_as2/public/js';
        public $url_img = '/khanhnpd02983_as2/public/images';
        public $url_css = '/khanhnpd02983_as2/public/css';
        public $url_lib = '/khanhnpd02983_as2/lib';

        public function model($nameModel) {
            require_once './mvc/models/' .$nameModel. '.php';
            return new $nameModel;
        }

        public function view($nameView, $data = []) {
            require_once './mvc/views/' .$nameView. '.php';
        }

        public function howLong($dateStart) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $dateNow = date('Y-m-d', time());

            $first_date = strtotime($dateNow);
            $second_date = strtotime($dateStart);
            $datediff = abs($first_date - $second_date);
            return floor($datediff / (60*60*24));
        }

        public function upload_file($nameFile, $dif) {
            $foldel_contai = $_SERVER["DOCUMENT_ROOT"] . $dif;
            $tmp_name = $_FILES[$nameFile]['tmp_name'];
            $nameFileUpload = $_FILES[$nameFile]['name'];

            move_uploaded_file($tmp_name, $foldel_contai .'/'. $nameFileUpload);

            return $nameFileUpload;
        }

        public function priceSale($price, $sale) {
            return $price - ($price / 100 * $sale);
        }

    }

    
?>