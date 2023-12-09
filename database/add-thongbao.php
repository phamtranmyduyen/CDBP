
<?php
require_once('../DataProvider.php');
$thoigian = date('Y-m-d H:i:s');
$ten = $_POST['addTenthanhvienbch'];
$noidung = $_POST['addNoidungthongbao'];
$ngaythuchien = $_POST['addNgaythuchien'];
$ngayhethan = $_POST['addNgayhethan'];
$phanloai = $_POST['addPhanloai'];
$sqlMaTVBCH ="SELECT tvbch.`Mã thành viên BCH CDBP`
            FROM thanhvienbch tvbch
            WHERE tvbch.`Tên tài khoản` = '$ten'";
            echo $sqlMaTVBCH;
$queryMaTVBCH = DataProvider::executeQuery($sqlMaTVBCH);
$rowMaTVBCH = mysqli_fetch_array($queryMaTVBCH);
// LẤY SỐ LƯỢNG
$sqlLayMa = "SELECT `Mã thông báo` 
            FROM `thongbao` 
            ORDER BY `Mã thông báo` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);
//MAIN SQL
while ($row = mysqli_fetch_array($queryLayMa)) {
    $ma = (int)preg_replace("/[^0-9]/", "", $row['Mã thông báo'])+1;
    $ma = sprintf("TB%03d", $ma);
    $sql = "INSERT INTO thongbao
        VALUES ('$ma','$noidung','$thoigian','$ngaythuchien','$ngayhethan','".$rowMaTVBCH['Mã thành viên BCH CDBP']."','0','$phanloai')";
    echo $sql;
    $query = DataProvider::executeQuery($sql);
}

if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>