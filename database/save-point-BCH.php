<?php
require_once('../DataProvider.php');
$mabangdiem = $_POST['mabangdiem'];
$diemBCHcham = $_POST['saveDiemBCHchitiettieuchi'];
$machitiettieuchi = $_POST['saveMachitiettieuchi'];
$diemBTV = $_POST['diemBTV'];
$maBCH;
$i = 0;
// XỬ LÝ Ý KIẾN
if(isset($_POST['actionykien']))
{
    $sqlYKien = "UPDATE ykien
                SET `Trạng thái` = 1
                WHERE `Mã bảng chấm điểm` = '$mabangdiem'";
    $queryYKien = DataProvider::executeQuery($sqlYKien);
}
// -----------------------------
foreach ($machitiettieuchi as $valueMCTTC) {
    $sqlPointBCH = "UPDATE `bangchamdiem_chitiettieuchi`
                SET `Điểm BCH chấm` = $diemBCHcham[$i]
                WHERE `Mã bảng chấm điểm` = '$mabangdiem'
                AND `Mã chi tiết tiêu chí` = '$valueMCTTC'";
    $queryPointBCH = DataProvider::executeQuery($sqlPointBCH);
    $i = $i + 1;
}
$diemBTV=(int)$diemBTV;
$sqlPointBTV = "UPDATE `bangchamdiem_tieuchi`
SET `Điểm BCH chấm` = '$diemBTV'
WHERE `Mã bảng chấm điểm` = '$mabangdiem'
AND `Mã tiêu chí` = 'TC009'";
$queryPointBTV = DataProvider::executeQuery($sqlPointBTV);
// LẤY TÊN BAN CHẤP HÀNH
session_start();
if (isset($_SESSION['Tên tài khoản'])) {
    $sqlMaBCH = "SELECT `Mã thành viên BCH CDBP`
                FROM thanhvienbch tvbch
                WHERE `Tên tài khoản` = '" . $_SESSION['Tên tài khoản'] . "'";
    $queryMaBCH = DataProvider::executeQuery($sqlMaBCH);
    while ($rowMaBCH = mysqli_fetch_array($queryMaBCH)) {
        $maBCH = $rowMaBCH['Mã thành viên BCH CDBP'];
    }
}
// KIỂM TRA TRẠNG THÁI XỬ LÝ => LƯU TÊN BCH XỬ LÝ VÀ CHỈNH SỬA
$sqlCheckTrangthai = "SELECT `Trạng thái`
                    FROM bangchamdiem bcd
                    WHERE bcd.`Mã bảng chấm điểm`='$mabangdiem'";
$queryCheckTrangthai = DataProvider::executeQuery($sqlCheckTrangthai);
$sqlUpdateTrangthai;
while ($rowCheckTrangthai = mysqli_fetch_array($queryCheckTrangthai)) {
    if ($rowCheckTrangthai['Trạng thái'] == 'Chưa xử lý') {
        $sqlUpdateTrangthai = "UPDATE bangchamdiem bd
        SET bd.`Trạng thái` = 'Đã xử lý',
        `Mã BCH chấm` = '$maBCH'        
        WHERE bd.`Mã bảng chấm điểm` = '$mabangdiem'";
    } else {
        $sqlUpdateTrangthai = "UPDATE bangchamdiem bd
        SET `Mã BCH chỉnh sửa` = '$maBCH'        
        WHERE bd.`Mã bảng chấm điểm` = '$mabangdiem'";
    }
}
$queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
if ($queryPointBCH) {
    echo "Lưu thành công";
} else
    echo "Lưu thất bại";
