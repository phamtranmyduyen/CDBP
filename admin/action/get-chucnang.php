
<?php
require_once('../../DataProvider.php');
$tenchucnang = [];
$maquyen = $_POST['maquyen'];

$sql = "SELECT DISTINCT `Tên chức năng`
        FROM quyen_chucnang qcn, chucnang cn
        WHERE `Mã quyền` = '" . $maquyen . "'
        AND qcn.`Mã chức năng` = cn.`Mã chức năng`";
$query = DataProvider::executeQuery($sql);

while ($row = mysqli_fetch_array($query)) {

    array_push($tenchucnang, $row['Tên chức năng']);
}


if ($query) {

    for ($i = 0; $i < count($tenchucnang); $i++) {
        echo ",".$tenchucnang[$i].",";
    }
    
}
?>