<?php
require_once('../DataProvider.php');
$mabangdiem = $_POST['mabangdiem'];
$sqlBangdiem = "SELECT *
                FROM bangchamdiem bcd
                WHERE bcd.`Mã bảng chấm điểm` = '$mabangdiem'";
$queryBangdiem = DataProvider::executeQuery($sqlBangdiem);

// XỬ LÝ


while ($rowBangdiem = mysqli_fetch_array($queryBangdiem)) {
    // MÃ CDBP
    $sqlTenCDBP = "SELECT cd.`Tên CDBP`
                FROM cdbp cd
                WHERE cd.`Mã CDBP` = '" . $rowBangdiem['Mã CDBP'] . "'";
    $queryTenCDBP = DataProvider::executeQuery($sqlTenCDBP);
    while ($rowTenCDBP = mysqli_fetch_array($queryTenCDBP)) {
        $tenCDBP = $rowTenCDBP['Tên CDBP'];
        echo "
        <h2 class='tenCDBP-title'>$tenCDBP</h2>
        <div class='detail-bangdiem'>
            <div class='detail-thoigian'>Thời gian: " . $rowBangdiem['Thời gian'] . "</div>
            <div class='detail-trangthai'>Trạng thái: " . $rowBangdiem['Trạng thái'] . "</div>
        </div>
        ";
    }
}
