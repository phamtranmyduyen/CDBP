<?php
require_once("../DataProvider.php");
$sql = "SELECT DISTINCT `Hiển thị chính thức` FROM `bangchamdiem`";
$query = DataProvider::executeQuery($sql);
$row = mysqli_fetch_array($query);
echo $row['Hiển thị chính thức'];