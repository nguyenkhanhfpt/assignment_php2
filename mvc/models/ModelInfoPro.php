<?php
    class ModelInfoPro extends Database{

        function insertDetailPro($maSanPham, $manHinh, $camera, $ram, $boNho, $heDieuHanh, $chip) {
            $sql = "INSERT INTO thongsosanpham(maSanPham, manHinh, camera, ram, boNho, heDieuHanh, chip)
                    VALUES(?, ?, ?, ?, ?, ?, ?)";
            $this->pdo_execute($sql, $maSanPham, $manHinh, $camera, $ram, $boNho, $heDieuHanh, $chip);
        }

        public function selectInfoPro($maSanPham){
            $sql = "SELECT * FROM thongsosanpham WHERE maSanPham = ?";
            $result = $this->pdo_query_one($sql, $maSanPham);
            return $result;
        }

        function updateDetailPro($maSanPham, $manHinh, $camera, $ram, $boNho, $heDieuHanh, $chip) {
            $sql = "UPDATE thongsosanpham SET manHinh = ?, camera = ?, 
                    ram = ?, boNho = ?, heDieuHanh = ?, chip =? 
                    WHERE maSanPham = ?";
            $this->pdo_execute($sql, $manHinh, $camera, $ram, $boNho, $heDieuHanh, $chip, $maSanPham);
        }

    }
?>