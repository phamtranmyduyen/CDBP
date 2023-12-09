<?php
require_once('../DataProvider.php');
$arrDiemCDBP = [];
$arrDiemBCH = [];
$sqlTongdiemtieuchi = "";
if (isset($_POST['maCDBP'])) {
    $maCDBP = $_POST['maCDBP'];

    $sqlTongdiemtieuchi = "SELECT `Mã tiêu chí`, SUM(`Điểm CDBP chấm`) AS tongdiemcdbp, SUM(`Điểm BCH chấm`) AS tongdiembch
                            FROM `bangchamdiem_chitiettieuchi` bdct, bangchamdiem bd, thongbao tb
                            WHERE bdct.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm`
                            AND bd.`Thời gian` >= tb.`Ngày thực hiện`
                            AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                            AND bd.`Mã CDBP` = '$maCDBP'
                            AND tb.`Hiển thị` = 0
                            AND tb.`Phân loại` = 'Chấm điểm'
                            GROUP BY `Mã tiêu chí`
                            ";
} else if (isset($_POST['mabangdiem'])) {
    $mabangdiem = $_POST['mabangdiem'];
    $sqlTongdiemtieuchi = "SELECT `Mã tiêu chí`, SUM(`Điểm CDBP chấm`) AS tongdiemcdbp, SUM(`Điểm BCH chấm`) AS tongdiembch
    FROM `bangchamdiem_chitiettieuchi` bdct, bangchamdiem bd
    WHERE bdct.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm`
    AND bd.`Mã bảng chấm điểm` = '$mabangdiem'
    GROUP BY `Mã tiêu chí`
    ";
}
// $sqlTongdiemtieuchi = "SELECT `Mã tiêu chí`, SUM(`Điểm CDBP chấm`) AS tongdiemcdbp, SUM(`Điểm BCH chấm`) AS tongdiembch
//                         FROM `bangchamdiem_chitiettieuchi` bdct
//                         GROUP BY `Mã tiêu chí`";
// echo $sqlTongdiemtieuchi;
$queryTongdiemtieuchi = DataProvider::executeQuery($sqlTongdiemtieuchi);

while ($row = mysqli_fetch_array($queryTongdiemtieuchi)) {
    // TỔNG ĐIỂM CDBP THEO TIÊU CHÍ
    array_push($arrDiemCDBP, $row['tongdiemcdbp']);
    // TỔNG ĐIỂM BCH THEO TIÊU CHÍ
    array_push($arrDiemBCH, $row['tongdiembch']);
}


if ($queryTongdiemtieuchi) {

    for ($i = 0; $i < count($arrDiemCDBP); $i++) {
        echo $arrDiemCDBP[$i] . ",";
    }
    echo "/";
    for ($j = 0; $j < count($arrDiemBCH); $j++) {
        echo $arrDiemBCH[$j] . ",";
    }
}
