<?php
require_once('../DataProvider.php');

if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
$filterMode = $_POST['filterMode'];
$valueFilter = $_POST['valueFilter'];
$sql;
if ($filterMode == 'true') {
    $sql = "SELECT *
    FROM bangchamdiem bcd
    WHERE bcd.`Trạng thái` like '%$find%'";
}
if ($filterMode == 'false') {
    $sql = "SELECT *
    FROM bangchamdiem";
}
// LẤY SỐ LƯỢNG THỎA MÃN
$queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                                FROM bangchamdiem bcd
                                                WHERE bcd.`Trạng thái` like '%$find%'
                                                 ");
$rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
$countDataFind = $rowLaySoLuong['Số lượng'];
echo "<div style='display: none' class='countindex-TVBCH'>$countDataFind</div>";
// _______________________________
$query =  DataProvider::executeQuery($sql);
while ($row = mysqli_fetch_array($query)) {
    $count++;
    if ($count > $start && $count <= $end) {
        echo "
        <div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>$tenCDBP</h5>
                <p class='card-text'>Thời gian: " . $rowBangdiem['Thời gian'] . "</p>
                <p class='card-text'>Trạng thái: " . $rowBangdiem['Trạng thái'] . "</p>
                <button value='" . $rowBangdiem['Mã bảng chấm điểm'] . "' class='btn btn-primary action-bang-diem'>Xử lý</button>
                <button value='" . $rowBangdiem['Mã bảng chấm điểm'] . "' class='btn btn-secondary khoa-bang-diem'>Khóa</button>
                <button style='display: none' value='" . $rowBangdiem['Mã bảng chấm điểm'] . "' class='btn btn-secondary mo-khoa-bang-diem'>Mở khóa</button>
            </div>
        </div>
        ";
    }
}
