<?php
require_once("../DataProvider.php");
$mabangdiem = $_POST['mabangdiem'];
$sql = "UPDATE ykien 
        SET `Sự thay đổi` = 1
        WHERE `Mã bảng chấm điểm` = '$mabangdiem'";
$query = DataProvider::executeQuery($sql);
if($query)
    echo "Xử lý thành công";
else
    echo "Xử lý thất bại";
?>