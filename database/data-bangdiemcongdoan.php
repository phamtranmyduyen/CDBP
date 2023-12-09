<?php
require_once('../DataProvider.php');
if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG CDBP
$sqlLaySoLuongCDBP = "SELECT COUNT(*) AS 'Số lượng'
            FROM cdbp";
$queryLaySoLuongCDBP = DataProvider::executeQuery($sqlLaySoLuongCDBP);

$row = mysqli_fetch_array($queryLaySoLuongCDBP);
$countDataCDBP = $row['Số lượng'];
echo "<div style='display:none' id='countbangdiemcongdoan'>$countDataCDBP</div>";
// XỬ LÝ
$sql = "SELECT *
    FROM cdbp";
$query = DataProvider::executeQuery($sql);




while ($row = mysqli_fetch_array($query)) {
    $count++;
    $tenCDBP = $row['Tên CDBP'];
    if ($count > $start && $count <= $end) {
        echo "
        <div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>$tenCDBP</h5>
                <button value='".$row['Mã CDBP']."' class='btn btn-primary show-bang-diem'>Xem tất cả</button>
                <button value='".$row['Mã CDBP']."' class='btn btn-secondary show-danh-sach-bang-diem'>Xem danh sách</button>
            </div>
        </div>
        ";
    }
}
