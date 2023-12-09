<?php
require_once('../DataProvider.php');
$arrDiemchuan =[];
$sqlDiemchuan = "SELECT `Điểm chuẩn chi tiết tiêu chí`
                        FROM `chitiettieuchichamdiem`";
$queryDiemchuan = DataProvider::executeQuery($sqlDiemchuan);

while ($row = mysqli_fetch_array($queryDiemchuan)) {
    array_push($arrDiemchuan, $row['Điểm chuẩn chi tiết tiêu chí']);
}


if ($queryDiemchuan) {

    for ($i = 0; $i < count($arrDiemchuan); $i++) {
        echo $arrDiemchuan[$i] . ",";
    }
}
