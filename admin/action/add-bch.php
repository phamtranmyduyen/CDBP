
<?php
require_once('../../DataProvider.php');

$soluongtv = $_POST['addBchSoluong'];
$ngaythanhlap = $_POST['addBchNgaythanhlap'];
$ngayketthuc = $_POST['addBchNgayketthuc'];

$sqlLayMa = "SELECT `Mã ban chấp hành CDBP` as `Mã`
            FROM bch 
            ORDER BY `Mã ban chấp hành CDBP` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);

while ($row = mysqli_fetch_array($queryLayMa)) {
    $row['Mã'] = preg_replace("/[^0-9]/ ", '',$row['Mã']);
    $mabch = sprintf("BCH%03d", (int)$row['Mã'] + 1);
    $khoabch = (int)$row['Số lượng'] + 1;
    $sql = "INSERT INTO bch(`Mã ban chấp hành CDBP`,`Số lượng`, `Khóa`, `Ngày thành lập`, `Ngày kết thúc`)
        VALUES ('$mabch','$soluongtv','$khoabch','$ngaythanhlap','$ngayketthuc');";
    $query = DataProvider::executeQuery($sql);
}

if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>