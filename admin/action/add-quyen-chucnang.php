
<?php
require_once('../../DataProvider.php');


if (isset($_POST['addChucnang'])) {
    $tenchucnang = $_POST['addChucnang'];
    $maquyen = $_POST['maquyen'];
$sqlReset = "DELETE FROM quyen_chucnang
            WHERE `Mã quyền` = '$maquyen'";
$queryReset = DataProvider::executeQuery($sqlReset);
    foreach ($tenchucnang as $value) {
        $sql = "SELECT `Mã chức năng`
        FROM chucnang cn
        WHERE cn.`Tên chức năng` = '$value'";
        $query = DataProvider::executeQuery($sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql2 = "INSERT INTO quyen_chucnang(`Mã quyền`,`Mã chức năng`)
            VALUES ('$maquyen','" . $row['Mã chức năng'] . "')";
            $query2 = DataProvider::executeQuery($sql2);
        }
    }
    if ($query2) {
        echo "Thêm thành công";
    } else echo "Thêm thất bại";
}
else echo "Thêm thành công";
?>