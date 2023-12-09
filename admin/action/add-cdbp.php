
<?php
require_once('../../DataProvider.php');

$tencdbp = $_POST['addTencdbp'];
$ngaythanhlap = $_POST['addNgaythanhlap'];
$ngayketthuc = $_POST['addNgayketthuc'];
$tentaikhoan = $_POST['addTentaikhoan'];


$sqlLayMa = "SELECT `Mã CDBP`
            FROM cdbp 
            ORDER BY `Mã CDBP` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);

while ($row = mysqli_fetch_array($queryLayMa)) {
    $row['Mã CDBP'] = preg_replace("/[^0-9]/ ", '',$row['Mã CDBP']);
    $macdbp = sprintf("CD%03d", (int)$row['Mã CDBP'] + 1);
    $sql = "INSERT INTO cdbp
        VALUES ('$macdbp','$tencdbp','$ngaythanhlap','$ngayketthuc','$tentaikhoan', 'Chưa chấm điểm');";
       // echo $sql;
    $query = DataProvider::executeQuery($sql);
}

if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>