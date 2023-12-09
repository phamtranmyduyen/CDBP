
<?php
require_once('../../DataProvider.php');

$ten= $_POST['addTvbchTen'];
$chucvu = $_POST['addTvbchChucvu'];
$sdt = $_POST['addTvbchSodienthoai'];
$email = $_POST['addTvbchEmail'];
$bch = $_POST['addTvbchBCH'];
$taikhoan = $_POST['addTvbchTaikhoan'];


$sqlLayMa = "SELECT `Mã thành viên BCH CDBP` as `Mã`
            FROM thanhvienbch 
            ORDER BY `Mã thành viên BCH CDBP` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);

while ($row = mysqli_fetch_array($queryLayMa)) {
    $row['Mã'] = preg_replace("/[^0-9]/ ", '',$row['Mã']);
    $ma = sprintf("TVBCH%03d", (int)$row['Mã'] + 1);
    $sql = "INSERT INTO thanhvienbch
        VALUES ('$ma','$ten','$chucvu','$sdt','$email','$bch','$taikhoan');";
    $query = DataProvider::executeQuery($sql);
}

if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>