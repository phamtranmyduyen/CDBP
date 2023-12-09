<?php
require_once('../DataProvider.php');
$mabangchamdiem = $_POST['mabangchamdiem'];
$noidungykien = $_POST['noidungykien'];
$trangthai = 0;
$suthaydoi = 0;
$maykien = "";
$kiemTraMa = "SELECT COUNT(*) AS 'Số lượng'
                FROM ykien";
$queryKiemTraMa = DataProvider::executeQuery($kiemTraMa);
while ($rowKiemTraMa = mysqli_fetch_array($queryKiemTraMa)) {
    if ($rowKiemTraMa['Số lượng'] == 0) {
        $maykien = "YK001";
    } else {
        $sqlLayMa = "SELECT `Mã ý kiến`
            FROM ykien
            ORDER BY `Mã ý kiến` DESC 
            LIMIT 1";
        $queryLayMa = DataProvider::executeQuery($sqlLayMa);
        while ($row = mysqli_fetch_array($queryLayMa)) {

            $row['Mã ý kiến'] = preg_replace("/[^0-9]/ ", '', $row['Mã ý kiến']);
            $maykien = sprintf("YK%03d", (int)$row['Mã ý kiến'] + 1);
        }
    }
    $sql = "INSERT INTO `ykien`
    VALUES ('$maykien', '$mabangchamdiem','$noidungykien',$trangthai,$suthaydoi)";
    $query = DataProvider::executeQuery($sql);
}
if ($query) {
    echo "Gửi ý kiến thành công";
} else
    echo "Gửi ý kiến thất bại";
