<?php
    class ModelComment extends Database {

        public function insertNewComment($maNguoiDungBinhLuan, $noiDung, $maSanPham) {
            $insert = "INSERT INTO binhluan(maNguoiDungBinhLuan, noiDung, maSanPham) 
                        VALUES(?, ?, ?)";
            $this->pdo_execute($insert, $maNguoiDungBinhLuan, $noiDung, $maSanPham);
        }

        public function selectComment($maSanPham) {
            $select = "SELECT noiDung, ngayBinhLuan, maNguoiDungBinhLuan ,maBinhLuan, anhNguoiDung, tenNguoiDung FROM binhLuan AS B 
                        INNER JOIN nguoidung AS N ON B.maNguoiDungBinhLuan = N.maNguoiDung 
                        WHERE B.maSanPham = ? ORDER BY ngayBinhLuan DESC";
            $result = $this->pdo_query($select, $maSanPham);
            return $result;
        }

        public function statisticalComemnts() {
            $select = "SELECT S.maSanPham, S.tenSanPham, S.anhSanPham, COUNT(maBinhLuan) FROM sanpham AS S 
                        INNER JOIN binhluan AS B ON S.maSanPham = B.maSanPham 
                        GROUP BY S.maSanPham";
            $result = $this->pdo_query($select);
            return $result;
        }

        public function deleteComment($maBinhLuan) {
            $detele = "DELETE FROM binhluan WHERE maBinhLuan = ?";
            $this->pdo_execute($detele, $maBinhLuan);
        }

        public function deleteComment2($maBinhLuan, $maNguoiDungBinhLuan) {
            $detele = "DELETE FROM binhluan WHERE maBinhLuan = ? AND maNguoiDungBinhLuan = ?";
            $this->pdo_execute($detele, $maBinhLuan, $maNguoiDungBinhLuan);
        }


    }
?>