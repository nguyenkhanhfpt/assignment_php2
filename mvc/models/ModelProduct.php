<?php
    class ModelProduct extends Database {

        protected $numProView = 12;
        public $numEnd;

        public function searchProduct($key) {
            if(strlen($key) == 0) {
                $key = "$@##@";
            }
            $sql = "SELECT * FROM sanpham WHERE tenSanPham LIKE '%$key%' ";
            $result = $this->con->query($sql);
            return $result;
        }

        public function countRow() {
            $nRows = $this->con->query('SELECT count(*) FROM sanpham')->fetchColumn(); 
            return $nRows;
        }

        public function selectAllProducts() {
            $sql = "SELECT * FROM sanpham ORDER BY ngayNhap DESC";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function selectAllProductsHome() {
            $sql = "SELECT * FROM sanpham ORDER BY ngayNhap DESC LIMIT 8";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function selectSaleProductsHome() {
            $sql = "SELECT * FROM sanpham ORDER BY giamGia DESC LIMIT 4";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function selectProductsSame($maThuongHieu) {
            $sql = "SELECT * FROM sanpham WHERE maThuongHieu = ? LIMIT 4";
            $result = $this->pdo_query($sql, $maThuongHieu);
            return $result;
        }

        public function selectViewProductsHome() {
            $sql = "SELECT * FROM sanpham ORDER BY soLuotXem DESC LIMIT 4";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function selectLimitProducts($num = 1) {
            $this->numEnd = ceil($this->countRow() / $this->numProView);
            $indexEnd = $num * $this->numProView;

            $sql = "SELECT * FROM sanpham ORDER BY ngayNhap DESC LIMIT 0, $indexEnd";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function sortProducts($order){
            if($order == 'highestPrice') {
                $sql = "SELECT * FROM sanpham ORDER BY giaSanPham - giaSanPham / 100 * giamGia DESC";
            }
            else if($order == 'lowestPrice') {
                $sql = "SELECT * FROM sanpham ORDER BY giaSanPham - giaSanPham / 100 * giamGia ASC";
            }
            else if($order == 'viewest') {
                $sql = "SELECT * FROM sanpham ORDER BY soLuotXem DESC";
            }
            else {
                $sql = "SELECT * FROM sanpham ORDER BY ngayNhap DESC";
            }
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function selectOneProduct($maSanPham) {
            $sql = "SELECT * FROM sanpham WHERE maSanPham = ?";
            $result = $this->pdo_query_one($sql, $maSanPham);
            return $result;
        }

        public function selectProduct($maSanPham){
            $sql = "SELECT S.*, T.* FROM sanpham AS S
                    INNER JOIN thongsosanpham AS T ON S.maSanPham = T.maSanPham
                    WHERE S.maSanPham = ?";
            $result = $this->pdo_query_one($sql, $maSanPham);
            return $result;
        }

        public function selectProFactory($maThuongHieu) {
            $sql = "SELECT * FROM sanpham WHERE maThuongHieu = ?";
            $result = $this->pdo_query($sql, $maThuongHieu);
            return $result;
        }

        public function sortProFactory($maThuongHieu, $order) {
            if($order == 'highestPrice') {
                $sql = "SELECT * FROM sanpham WHERE maThuongHieu = ? ORDER BY giaSanPham - giaSanPham / 100 * giamGia DESC";
            }
            else if($order == 'lowestPrice') {
                $sql = "SELECT * FROM sanpham WHERE maThuongHieu = ? ORDER BY giaSanPham - giaSanPham / 100 * giamGia ASC";
            }
            else if($order == 'viewest') {
                $sql = "SELECT * FROM sanpham WHERE maThuongHieu = ? ORDER BY soLuotXem DESC";
            }
            else {
                $sql = "SELECT * FROM sanpham WHERE maThuongHieu = ? ORDER BY ngayNhap DESC";
            }
            $result = $this->pdo_query($sql, $maThuongHieu);
            return $result;
        }

        public function selectProView() {
            $sql = "SELECT * FROM sanpham ORDER BY soLuotXem DESC LIMIT 5";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function insertNewProduct($maSanPham, $mathuongHieu, $tenSanPham , $giaSanPham, $giamGia, $soLuong, $anhSanPham, $soLuotXem) {
            $sql = "INSERT INTO sanpham(maSanPham, maThuongHieu, tenSanPham, giaSanPham, giamGia, soLuong, anhSanPham, soLuotXem) 
                    VALUES(? , ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo_execute($sql, $maSanPham, $mathuongHieu, $tenSanPham , $giaSanPham, $giamGia, $soLuong, $anhSanPham, $soLuotXem);
        }

        public function deleteProduct($maSanPham) {
            $sql = "DELETE FROM sanpham WHERE maSanPham = ?";
            $this->pdo_execute($sql, $maSanPham);
        }

        public function updateNumPro($maSanPham, $soLuong) {
            $update = "UPDATE sanpham SET soLuong = soLuong - ? WHERE maSanPham = ?";
            $this->pdo_execute($update, $soLuong, $maSanPham);
        }

        public function updateProduct($maSanPham, $mathuongHieu, $tenSanPham , $giaSanPham, $giamGia, $soLuong, $anhSanPham) {
            $sql = "UPDATE sanpham SET maThuongHieu = ?, tenSanPham = ?, giaSanPham = ?, giamGia = ?, 
                    soLuong = ?, anhSanPham = ? 
                    WHERE maSanPham = ?";
            $this->pdo_execute($sql, $mathuongHieu, $tenSanPham , $giaSanPham, $giamGia, $soLuong, $anhSanPham, $maSanPham);
        }

        public function updateViewPro($maSanPham) {
            $update = "UPDATE sanpham SET soLuotXem = soLuotXem + 1 WHERE maSanPham = ?";
            $this->pdo_execute($update, $maSanPham);
        }
    }
?>