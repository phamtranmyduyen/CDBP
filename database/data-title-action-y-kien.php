<?php
require_once('../DataProvider.php');
$mabangdiem = $_POST['mabangdiem'];
$sqlBangdiem = "SELECT bcd.`Thời gian`, yk.`Trạng thái`, bcd.`Mã CDBP`
                FROM bangchamdiem bcd, ykien yk
                WHERE bcd.`Mã bảng chấm điểm` = yk.`Mã bảng chấm điểm` 
                AND bcd.`Mã bảng chấm điểm` = '$mabangdiem'";
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
            <div class='detail-thoigian'>Thời gian: " . $rowBangdiem['Thời gian'] . "</div>";
            if($rowBangdiem['Trạng thái']==0)
            {
                echo "<div class='detail-trangthai'>Trạng thái: Chưa xử lý</div>";
            }
            else echo "<div class='detail-trangthai'>Trạng thái: Đã xử lý</div>";
            
        echo  "</div>";
    }
}
