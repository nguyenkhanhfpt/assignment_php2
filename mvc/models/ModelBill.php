<?php

require './lib/Classes/PHPExcel.php';

class ModelBill extends Database
{

    public function createNewBill($maHoaDon, $maNguoiDung)
    {
        $trangThai = 0;

        $insert = "INSERT INTO hoadon(maHoaDon, maNguoiDung, trangThai) 
                        VALUES(?, ?, ?)";

        $this->pdo_execute($insert, $maHoaDon, $maNguoiDung, $trangThai);
    }

    public function randomIdBill()
    {
        $maHoaDon = rand(10000, 999999999);

        for ($i = 0; $i < 5; $i++) {
            if ($this->checkIdBill($maHoaDon) == false) {
                break;
            } else {
                $maHoaDon = rand(10000, 999999999);
            }
        }
        return $maHoaDon;
    }

    public function checkIdBill($maDonHang)
    {
        $select = "SELECT trangThai FROM donhang WHERE maDonHang = ?";
        return $this->pdo_query_one($select, $maDonHang);
    }

    public function selectNewBill()
    {
        $select = "SELECT H.*,count(C.maSanPham), SUM(C.soTien), N.tenNguoiDung, N.anhNguoiDung FROM hoadon AS H 
                        INNER JOIN chitietdonhang AS C ON H.maHoaDon = C.maHoaDon 
                        INNER JOIN nguoidung AS N ON H.maNguoiDung = N.maNguoiDung 
                        WHERE H.trangThai = 0 
                        GROUP BY H.maHoaDon 
                        ORDER BY H.thoiGianMua DESC";
        return $this->pdo_query($select);
    }

    public function selectOldBill()
    {
        $select = "SELECT H.*,count(C.maSanPham), SUM(C.soTien), N.tenNguoiDung, N.anhNguoiDung FROM hoadon AS H 
                        INNER JOIN chitietdonhang AS C ON H.maHoaDon = C.maHoaDon 
                        INNER JOIN nguoidung AS N ON H.maNguoiDung = N.maNguoiDung 
                        WHERE H.trangThai = 1
                        GROUP BY H.maHoaDon 
                        ORDER BY H.thoiGianMua DESC";
        return $this->pdo_query($select);
    }

    public function viewDetailBill($maHoaDon)
    {
        $select = "SELECT H.*, N.* FROM hoadon AS H 
                        INNER JOIN nguoidung AS N ON H.maNguoiDung = N.maNguoiDung 
                        WHERE H.maHoaDon = ?";
        return $this->pdo_query_one($select, $maHoaDon);
    }

    public function ship($maHoaDon)
    {
        $update = "UPDATE hoadon SET trangThai = 1 WHERE maHoaDon = ?";
        $this->pdo_execute($update, $maHoaDon);
    }

    public function deleteBill($maHoaDon)
    {
        $delete = "DELETE FROM hoadon WHERE maHoaDon = ? AND trangThai = 0";
        $this->pdo_execute($delete, $maHoaDon);
    }

    public function selectTopBuyProDays($dateAgo = 1)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateNow = date('Y-m-d', time());
        $days_ago = date('Y-m-d', strtotime("-$dateAgo days", strtotime($dateNow)));

        $select = "SELECT C.maSanPham, SUM(soLuongMua), S.* FROM hoadon AS H 
                        INNER JOIN chitietdonhang AS C ON H.maHoaDon = C.maHoaDon 
                        INNER JOIN sanpham AS S ON C.maSanPham = S.maSanPham
                        WHERE trangThai = 1 AND ngayMua BETWEEN ? AND ?
                        GROUP BY C.maSanPham 
                        ORDER BY SUM(soLuongMua) DESC LIMIT 10";
        return $this->pdo_query($select, $days_ago, $dateNow);
    }

    
    public function selectBillExcel()
    {
        $select = "SELECT H.thoiGianMua,C.maHoaDon,C.soLuongMua, N.tenNguoiDung,soTien, S.tenSanPham FROM hoadon AS H 
                        INNER JOIN chitietdonhang AS C ON H.maHoaDon = C.maHoaDon 
                        INNER JOIN nguoidung AS N ON H.maNguoiDung = N.maNguoiDung 
                        INNER JOIN sanpham AS S ON C.maSanPham = S.maSanPham
                        WHERE H.trangThai = 1 
                        ORDER BY H.thoiGianMua DESC";
        return $this->pdo_query($select);
    }

    public function exportExel()
    {
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Hóa đơn');

        $rowCount = 1;
        $sheet->setCellValue('A' . $rowCount, 'Mã hóa đơn');
        $sheet->setCellValue('B' . $rowCount, 'Tên người mua');
        $sheet->setCellValue('C' . $rowCount, 'Tên sản phẩm');
        $sheet->setCellValue('D' . $rowCount, 'Số lượng mua');
        $sheet->setCellValue('E' . $rowCount, 'Thành tiền');
        $sheet->setCellValue('F' . $rowCount, 'Thời gian mua');

        $table = $this->selectBillExcel();
        foreach($table as $value){
            $rowCount++;
            $sheet->setCellValue('A' . $rowCount, $value['maHoaDon']);
            $sheet->setCellValue('B' . $rowCount, $value['tenNguoiDung']);
            $sheet->setCellValue('C' . $rowCount, $value['tenSanPham']);
            $sheet->setCellValue('D' . $rowCount, $value['soLuongMua']);
            $sheet->setCellValue('E' . $rowCount, $value['soTien']);
            $sheet->setCellValue('F' . $rowCount, $value['thoiGianMua']);
        }

        $objWrite = new PHPExcel_Writer_Excel2007($objExcel);
        $filename = 'hoadon.xlsx';
        $objWrite->save($filename);

        header("Content-Disposition: attachment; filename= $filename");
        header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');

        readfile($filename);

        exit();
    }
}
