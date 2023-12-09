
<?php
require_once('../../DataProvider.php');
$matieuchi = $_POST['editMatieuchi'];
$noidungtieuchi = $_POST['editNoidungtieuchi'];
$diemchuantieuchi = $_POST['editDiemchuantieuchi'];
$sql = "UPDATE `tieuchichamdiem` 
SET `Nội dung tiêu chí`='$noidungtieuchi', `Điểm chuẩn tiêu chí`='$diemchuantieuchi' 
WHERE `Mã tiêu chí`='$matieuchi'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Thay đổi thành công";
}
else echo "Thay đổi thất bại";
?>