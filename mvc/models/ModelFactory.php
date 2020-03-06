<?php
    class ModelFactory extends Database {

        public function selectAllFactory() {
            $sql = "SELECT * FROM thuongHieu";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function selectFactory($maThuongHieu) {
            $sql = "SELECT * FROM thuongHieu WHERE maThuongHieu = ?";
            $result = $this->pdo_query_one($sql, $maThuongHieu);
            return $result;
        }

        public function countProFactory() {
            $sql = "SELECT T.maThuongHieu, tenThuongHieu,count(S.tenSanPham), maSanPham FROM thuongHieu AS T 
                    INNER JOIN sanpham AS S ON T.maThuongHieu = S.maThuongHieu GROUP BY T.maThuongHieu";
            $result = $this->pdo_query($sql);
            return $result;
        }

        public function inserNewFactory($maThuongHieu, $tenThuongHieu, $anhThuongHieu) {
            $sql = "INSERT INTO thuonghieu VALUES(?, ?, ?)";
            $this->pdo_execute($sql, $maThuongHieu, $tenThuongHieu, $anhThuongHieu);
        }

        public function deleteFactory($maThuongHieu) {
            $sql = "DELETE FROM thuonghieu WHERE maThuongHieu = ?";
            $this->pdo_execute($sql, $maThuongHieu);
        }

        public function updateFactory($maThuongHieu, $tenThuongHieu, $anhThuongHieu){
            $update = "UPDATE thuonghieu SET tenThuongHieu = ?, anhThuongHieu = ? WHERE maThuongHieu = ?";
            $this->pdo_execute($update, $tenThuongHieu, $anhThuongHieu, $maThuongHieu);
        }
    }
?>