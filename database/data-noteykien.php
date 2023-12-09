<?php
require_once("../DataProvider.php");
$mabangdiem = $_POST['mabangchamdiem'];
$sqlCoYKien = "SELECT COUNT(*) AS 'Số lượng'
                FROM ykien 
                WHERE `Mã bảng chấm điểm` = '$mabangdiem'";
$queryCoYKien = DataProvider::executeQuery($sqlCoYKien);
$rowCoYKien = mysqli_fetch_array($queryCoYKien);
if ($rowCoYKien['Số lượng'] == 0) {
    echo " Không có ý kiến";
}
$sql = "SELECT `Trạng thái`, `Sự thay đổi`
        FROM ykien 
        WHERE `Mã bảng chấm điểm` = '$mabangdiem'";
$query = DataProvider::executeQuery($sql);
while ($row = mysqli_fetch_array($query)) {
    if ($row['Trạng thái'] == 0) {
        echo " Ý kiến chưa được xử lý";
    }
    else if ($row['Trạng thái'] == 1 && $row['Sự thay đổi'] == 1)
        echo " Ý kiến đã được xử lý, có sự thay đổi";
    else
        echo " Ý kiến đã được xử lý, không thay đổi";
}
