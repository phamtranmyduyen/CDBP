
<?php
require_once('../../DataProvider.php');

$noidungchitiettieuchi = $_POST['addNoidungchitiettieuchi'];
$diemchuanchitiettieuchi = $_POST['addDiemchuanchitiettieuchi'];
$tentieuchi = $_POST['addTentieuchi'];

$sqlLayMaTC = "SELECT `Mã tiêu chí`
        FROM tieuchichamdiem tc
        WHERE tc.`Nội dung tiêu chí` = '$tentieuchi'";
$queryLayMaTC = DataProvider::executeQuery($sqlLayMaTC);
//Lấy SL => Tăng ID
$sqlLayMa = "SELECT `Mã chi tiết tiêu chí` as `Mã`
            FROM chitiettieuchichamdiem
            ORDER BY `Mã chi tiết tiêu chí` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);

while ($row = mysqli_fetch_array($queryLayMa)) {
    $row['Mã'] = preg_replace("/[^0-9]/ ", '',$row['Mã']);
    while ($row1 = mysqli_fetch_array($queryLayMaTC)) {
        $machitiettieuchi = sprintf("CTTC%03d", (int)$row['Mã'] + 1);
        $sql = "INSERT INTO chitiettieuchichamdiem(`Mã chi tiết tiêu chí`,`Nội dung chi tiết tiêu chí`, `Điểm chuẩn chi tiết tiêu chí`,`Mã tiêu chí`)
        VALUE ('$machitiettieuchi','$noidungchitiettieuchi','$diemchuanchitiettieuchi','".$row1['Mã tiêu chí']."')";
        $query = DataProvider::executeQuery($sql);
    }
}
if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>