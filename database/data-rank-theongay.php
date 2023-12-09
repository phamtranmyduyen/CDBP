<?php
require_once('../DataProvider.php');
if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
$tungay = date_format(date_create($_POST['tungay']), "Y-m-d");
$denngay = date_format(date_create($_POST['denngay']), "Y-m-d");

$sql = "SELECT cdbp.`Tên CDBP`, SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`) AS Điểm
                FROM bangchamdiem, bangchamdiem_chitiettieuchi,cdbp 
                WHERE cdbp.`Mã CDBP` = bangchamdiem.`Mã CDBP` 
                AND bangchamdiem.`Mã bảng chấm điểm` = bangchamdiem_chitiettieuchi.`Mã bảng chấm điểm`
                AND bangchamdiem.`Trạng thái`='Đã xử lý' 
                AND bangchamdiem.`Thời gian` >= '$tungay'
                AND bangchamdiem.`Thời gian` <= '$denngay'
                GROUP BY bangchamdiem.`Mã CDBP` 
                ORDER BY SUM(bangchamdiem_chitiettieuchi.`Điểm BCH chấm`)  DESC, cdbp.`Tên CDBP`";
// XỬ LÝ
$data = "";
$query = DataProvider::executeQuery($sql);

$hang = 1;
while ($row = mysqli_fetch_array($query)) {
    $data = "<tr>
    <td width='25%'>
        <div class='thu-hang'>
<p>" . $hang++ . "</p>

        </div>
    </td>
            <td width='50%'>" . $row['Tên CDBP'] . "</td>
            <td width='25%'>
                    <div class='khung-nho'>
                    <p style='font-weight: bold'>" . $row['Điểm'] . "</p>
                    </div>
            </td>
    </tr>";
    if ($data != "")
        echo $data;
}
if ($data == "") {
    echo "<div class='none-rank-theongay'>Không có bảng điểm trong thời gian này</div>";
}
