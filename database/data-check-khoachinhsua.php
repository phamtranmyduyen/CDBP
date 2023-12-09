<?php
require_once('../DataProvider.php');
$arrkhoabangdiem = $_POST['arrkhoabangdiem'];
foreach($arrkhoabangdiem as $value)
{
    $sql = "SELECT `Khóa chỉnh sửa`
            FROM bangchamdiem bd
            WHERE bd.`Mã bảng chấm điểm` = '$value'";
    $query = DataProvider::executeQuery($sql);
    $row = mysqli_fetch_array($query);
    echo $row['Khóa chỉnh sửa']." ";
}
?>