
<?php
require_once('../DataProvider.php');

$thoigian = date('Y-m-d H:i:s');
$machitiettieuchi = $_POST['saveNoidungchitiettieuchi'];
$diemCDBPcham = $_POST['saveDiemCDBPchitiettieuchi'];
$tenCDBP = $_POST['tenCDBP'];
// QUERY MÃ BẢNG CHẤM ĐIỂM
$sqlMabcd = "SELECT COUNT(*) AS 'Số lượng'
            FROM bangchamdiem";
$queryMabcb = DataProvider::executeQuery($sqlMabcd);

// QUERY MÃ CDBP
$sqlMaCDBP = "SELECT `Mã CDBP`
                FROM cdbp
                WHERE cdbp.`Mã CDBP` = '$tenCDBP'";
// echo $sqlMaCDBP;
$queryMaCDBP = DataProvider::executeQuery($sqlMaCDBP);


// XỬ LÝ

while ($rowMabcd = mysqli_fetch_array($queryMabcb)) {
    $mabcd = sprintf("BCD%03d", (int)$rowMabcd['Số lượng'] + 1);
    $i = 0;
    foreach ($machitiettieuchi as $valueMCTTC) {

        while ($rowMaCDBP = mysqli_fetch_array($queryMaCDBP)) {
            $macdbp = $rowMaCDBP['Mã CDBP'];
            $sqlInsertBcd = "INSERT INTO bangchamdiem(`Mã bảng chấm điểm`,`Thời gian`,`Trạng thái`,`Mã BCH chấm`,`Mã BCH chỉnh sửa`,`Mã CDBP`,`Khóa chỉnh sửa`,`Hiển thị chính thức`)
                        VALUES ('$mabcd','$thoigian','Chưa xử lý', '', '','$macdbp',0,0)";
            $queryInsertBcd = DataProvider::executeQuery($sqlInsertBcd);
        }
        // Lấy MÃ tiêu chí từ bảng `chitiettieuchichamdiem`
        $sqlTieuchi = "SELECT cttc.`Mã tiêu chí`
                        FROM chitiettieuchichamdiem cttc
                        WHERE '$valueMCTTC' = cttc.`Mã chi tiết tiêu chí`";
        $queryTieuchi = DataProvider::executeQuery($sqlTieuchi);
        $diemCDBP = (int)$diemCDBPcham[$i];
        while ($rowTieuchi = mysqli_fetch_array($queryTieuchi)) {
            $sqlInsertBcdCttc = "INSERT INTO bangchamdiem_chitiettieuchi(`Mã bảng chấm điểm`,`Mã chi tiết tiêu chí`,`Mã tiêu chí`,`Điểm CDBP chấm`,`Điểm BCH chấm`)
                VALUES ('$mabcd','$valueMCTTC','".$rowTieuchi['Mã tiêu chí']."',$diemCDBP,0);";
            $queryInsertBcdCttc = DataProvider::executeQuery($sqlInsertBcdCttc);
            $i = $i + 1;
        }
    }
}

if ($queryInsertBcdCttc) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>