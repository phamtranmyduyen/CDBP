<?php
require_once('../DataProvider.php');
// $khoatudong = $_POST['khoatudong'];
$date = date('Y-m-d H:i:s');
// echo $khoatudong;
// if ($khoatudong == 'true') {

    $sqlKhoatudong = "UPDATE bangchamdiem
                        SET `Khóa chỉnh sửa` = '1'
                        WHERE `Mã bảng chấm điểm` IN (SELECT DISTINCT bd.`Mã bảng chấm điểm`
                                            FROM bangchamdiem bd, thongbao tb
                                            WHERE '$date'  < tb.`Ngày thực hiện`
                                            OR '$date' > tb.`Ngày hết hạn`
                                            AND tb.`Phân loại` = 'Chấm điểm'
                                            AND tb.`Hiển thị` = '0')";
    // echo $sqlKhoatudong;
    $queryKhoatudong = DataProvider::executeQuery($sqlKhoatudong);
// }
$countKhoa = 0;
while ($rowKhoatudong = mysqli_fetch_array($queryKhoatudong)) {
    $countKhoa++;
}
$queryCountBangchamdiem = DataProvider::executeQuery("SELECT COUNT(*) AS countbangchamdiem
                                                    FROM bangchamdiem");
$rowCountBangchamdiem = mysqli_fetch_array($queryCountBangchamdiem);
if($countKhoa == $rowCountBangchamdiem['countbangchamdiem'])
{
    echo true;
}             
else echo false;                                                                               

//Khóa tự động => Mỗi lần vào chấm điểm => check ngày => check khóa
