<?php
    class ModelDetailBill extends Database {
        
        public function createNewDetailBill($maHoaDon, $maSanPham, $soLuongMua, $soTien) {
            $insert = "INSERT INTO chitietdonhang(maHoaDon, maSanPham, soLuongMua, soTien) 
                        VALUES(?, ?, ?, ?)";
            $this->pdo_execute($insert, $maHoaDon, $maSanPham, $soLuongMua, $soTien);
        }

        public function selectProInBill($maHoaDon) {
            $select = "SELECT C.*, S.tenSanPham, S.anhSanPham, S.giaSanPham, S.giamGia FROM chitietdonhang AS C
                        INNER JOIN sanpham AS S ON C.maSanPham = S.maSanPham
                        WHERE maHoaDon = ?";
            return $this->pdo_query($select, $maHoaDon);
        }

        public function sumBill($maHoaDon) {
            $select = "SELECT SUM(soTien) FROM chitietdonhang WHERE maHoaDon = ? GROUP BY maHoaDon";
            $result = $this->pdo_query_one($select, $maHoaDon);
            return $result['SUM(soTien)'];
        }
    }
?>