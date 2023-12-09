<?php

require_once('../DataProvider.php');

$sql = "SELECT cdbp.`Tên CDBP`,  
        SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`) AS Điểm
        FROM bangchamdiem, bangchamdiem_chitiettieuchi,cdbp 
        WHERE cdbp.`Mã CDBP` = bangchamdiem.`Mã CDBP` 
        AND bangchamdiem.`Mã bảng chấm điểm` = bangchamdiem_chitiettieuchi.`Mã bảng chấm điểm`
        AND bangchamdiem.`Trạng thái`='Đã xử lý' 
        GROUP BY bangchamdiem.`Mã CDBP` 
        ORDER BY SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`)  DESC, cdbp.`Tên CDBP`";

if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
$valueFilter = $_POST['valueFilter'];
// LẤY SỐ LƯỢNG
$sqlLaySoLuong;
$sqlBangdiem;
if ($valueFilter == 'filter') {

    $sql = "SELECT cdbp.`Tên CDBP`,  
    SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`) AS Điểm
    FROM bangchamdiem, bangchamdiem_chitiettieuchi,cdbp 
    WHERE cdbp.`Mã CDBP` = bangchamdiem.`Mã CDBP` 
    AND bangchamdiem.`Mã bảng chấm điểm` = bangchamdiem_chitiettieuchi.`Mã bảng chấm điểm`
    AND bangchamdiem.`Trạng thái`='Đã xử lý' 
    GROUP BY bangchamdiem.`Mã CDBP` 
    ORDER BY SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`)  DESC, cdbp.`Tên CDBP`";
} else if ($valueFilter == 'high') {

    $sql = "SELECT cdbp.`Tên CDBP`,  
        SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`) AS Điểm
        FROM bangchamdiem, bangchamdiem_chitiettieuchi,cdbp 
        WHERE cdbp.`Mã CDBP` = bangchamdiem.`Mã CDBP` 
        AND bangchamdiem.`Mã bảng chấm điểm` = bangchamdiem_chitiettieuchi.`Mã bảng chấm điểm`
        AND bangchamdiem.`Trạng thái`='Đã xử lý' 
        GROUP BY bangchamdiem.`Mã CDBP` 
        ORDER BY SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`)  DESC, cdbp.`Tên CDBP`";
} else if ($valueFilter == 'low') {
    $sql = "SELECT cdbp.`Tên CDBP`,  
    SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`) AS Điểm
    FROM bangchamdiem, bangchamdiem_chitiettieuchi,cdbp 
    WHERE cdbp.`Mã CDBP` = bangchamdiem.`Mã CDBP` 
    AND bangchamdiem.`Mã bảng chấm điểm` = bangchamdiem_chitiettieuchi.`Mã bảng chấm điểm`
    AND bangchamdiem.`Trạng thái`='Đã xử lý' 
    GROUP BY bangchamdiem.`Mã CDBP` 
    ORDER BY SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`)  ASC, cdbp.`Tên CDBP`";
}
$result = DataProvider::executeQuery($sql);
$sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
                FROM bangchamdiem
                WHERE bangchamdiem.`Trạng thái`='Đã xử lý' 
                GROUP BY bangchamdiem.`Mã CDBP`";
$queryLaySoLuong = DataProvider::executeQuery($sqlLaySoLuong);
$row = mysqli_fetch_array($queryLaySoLuong);
$countData = $row['Số lượng'];
if ($countData == '0') {
    echo "<div class='none-bangchamdiem-moinhat'>Không có bảng chấm điểm</div>";
} else {
    echo "<div style='display:none' id='countrank'>$countData</div>";

    $hang = 1;


    while ($row = mysqli_fetch_array($result)) {
        $count++;

        if ($count > $start && $count <= $end) {
            echo
            "<tr>
        <td width='25%'>
            <div class='thu-hang'>
<p>" . $hang++ . "</p>

            </div>
        </td>
                <td width='50%'>" . $row['Tên CDBP'] . "</td>
                <td width='25%'>
                        <div class='khung-nho'>
                        <p style='font-weight: bold'>" . $row['Điểm'] . "</p>
                        </div>
                </td>
        </tr>";
        }
    }
}
