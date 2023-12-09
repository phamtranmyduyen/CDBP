<?php
require_once('../DataProvider.php');
$mokhoa = $_POST['mokhoa'];
if($mokhoa == '0')
{
    $sql = "UPDATE bangchamdiem
    SET `Hiển thị chính thức` = '1'";
}
else {
    $sql = "UPDATE bangchamdiem
    SET `Hiển thị chính thức` = '0'";
}

$query = DataProvider::executeQuery($sql);
