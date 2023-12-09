<?php
require_once('../DataProvider.php');
$maCDBP = $_POST['maCDBP'];
$sqlMabangchamdiem = "SELECT bd.`Mã bảng chấm điểm`
                    FROM bangchamdiem_chitiettieuchi bdct, bangchamdiem bd, thongbao tb
                    WHERE bdct.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm`
                    AND bd.`Thời gian` >= tb.`Ngày thực hiện`
                    AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                    AND bd.`Mã CDBP` = '$maCDBP'
                    AND tb.`Hiển thị` = 0
                    AND tb.`Phân loại` = 'Chấm điểm'";
$queryMabangchamdiem = DataProvider::executeQuery($sqlMabangchamdiem);
$mabangdiem = mysqli_fetch_array($queryMabangchamdiem)[0];


$diemCDBPmoi = $_POST['saveDiemCDBPmoi'];
$machitiettieuchi = $_POST['saveMachitiettieuchi'];
$i = 0;
foreach ($machitiettieuchi as $valueMCTTC) {
    $diemCDBP = (int)$diemCDBPmoi[$i];
    $sqlPointCDBP = "UPDATE `bangchamdiem_chitiettieuchi`
                SET `Điểm CDBP chấm` = $diemCDBP
                WHERE `Mã bảng chấm điểm` = '$mabangdiem'
                AND `Mã chi tiết tiêu chí` = '$valueMCTTC'";
    $queryPointCDBP = DataProvider::executeQuery($sqlPointCDBP);
    $i = $i + 1;
}
if ($queryPointCDBP) {
    echo "Lưu thành công";
} else
    echo "Lưu thất bại";
