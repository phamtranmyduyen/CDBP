
<?php
require_once('../DataProvider.php');
$noidunggioithieu = $_POST['noidunggioithieu'];
$hinhanh = $_POST['hinhanh'];
$chitietgioithieu = $_POST['chitietgioithieu'];

// LẤY SỐ LƯỢNG GIỚI THIỆU
$sqlLayMaGT = "SELECT `Mã giới thiệu` 
            FROM `gioithieu` 
            ORDER BY `Mã giới thiệu` DESC 
            LIMIT 1";
$queryLayMaGT = DataProvider::executeQuery($sqlLayMaGT);
//MAIN SQL
while ($rowGT = mysqli_fetch_array($queryLayMaGT)) {
    $maGT = (int)preg_replace("/[^0-9]/", "", $rowGT['Mã giới thiệu'])+1;
    $maGT = sprintf("GT%03d", $maGT);
    $sqlGT = "INSERT INTO gioithieu
        VALUES ('$maGT','$noidunggioithieu','$hinhanh',0)";
    $queryGT = DataProvider::executeQuery($sqlGT);
}

//MAIN SQL
foreach ($chitietgioithieu as $value) {
    // LẤY SỐ LƯỢNG CHI TIẾT GIỚI THIỆU
    $sqlLayMaCTGT = "SELECT `Mã chi tiết giới thiệu` 
                    FROM `chitietgioithieu` 
                    ORDER BY `Mã chi tiết giới thiệu` DESC 
                    LIMIT 1";
    $queryLayMaCTGT = DataProvider::executeQuery($sqlLayMaCTGT);
    while ($rowCTGT = mysqli_fetch_array($queryLayMaCTGT)) {
        $ma = (int)preg_replace("/[^0-9]/", "", $rowCTGT['Mã chi tiết giới thiệu'])+1;
        $ma = sprintf("CTGT%03d", $ma);
        $sql = "INSERT INTO chitietgioithieu
        VALUES ('$ma','$maGT','$value',0)";
        $query = DataProvider::executeQuery($sql);
    }
}
// foreach($chitietgioithieu as $value) {
//     echo "$value/";
// }

if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>