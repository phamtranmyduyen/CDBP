<?php
require_once('../DataProvider.php');
if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG 
$sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
            FROM thongbao";
$queryLaySoLuong = DataProvider::executeQuery($sqlLaySoLuong);

$row = mysqli_fetch_array($queryLaySoLuong);
$countData = $row['Số lượng'];
echo "<div style='display:none' id='countnotification-BCH'>$countData</div>";


// XỬ LÝ

$sqlThongbao = "SELECT *
                FROM thongbao";
$queryThongbao = DataProvider::executeQuery($sqlThongbao);
// $i = 0;

while ($rowThongbao = mysqli_fetch_array($queryThongbao)) {
    // $i++;
    // MÃ Thanhvienbch
    $sqlTenThanhvienbch = "SELECT tvbch.`Tên thành viên BCH CDBP`
                FROM thanhvienbch tvbch
                WHERE tvbch.`Mã thành viên BCH CDBP` = '" . $rowThongbao['Mã thành viên BCH CDBP'] . "'";
    $queryTenThanhvienbch = DataProvider::executeQuery($sqlTenThanhvienbch);
    while ($rowTenThanhvienbch = mysqli_fetch_array($queryTenThanhvienbch)) {
        $count++;
        $tenThanhvienbch = $rowTenThanhvienbch['Tên thành viên BCH CDBP'];
        if ($count > $start && $count <= $end) {
            // $dateUp = date_format(date_create($rowThongbao['Ngày đăng']),"Y-m-d\TH:i:s");
            // $dateStart = date_format(date_create($rowThongbao['Ngày thực hiện']),"Y-m-d\TH:i:s");
            // $dateEnd = date_format(date_create($rowThongbao['Ngày hết hạn']),"Y-m-d\TH:i:s");
            echo "
            <tr>
                <th class='".$rowThongbao['Mã thông báo']."'>" . $rowThongbao['Mã thông báo'] . "</th>
                <th class='".$rowThongbao['Mã thông báo']."'>" . $rowThongbao['Nội dung thông báo'] . "</th>
                <th class='".$rowThongbao['Mã thông báo']."'>".$rowThongbao['Ngày đăng']."</th>
                <th class='".$rowThongbao['Mã thông báo']."'>".$rowThongbao['Ngày thực hiện']."</th>
                <th class='".$rowThongbao['Mã thông báo']."'>".$rowThongbao['Ngày hết hạn']."</th>
                <th class='".$rowThongbao['Mã thông báo']."'>" . $rowTenThanhvienbch['Tên thành viên BCH CDBP'] . "</th>
                <th><button value='" . $rowThongbao['Mã thông báo'] . "' class='btn btn-outline-primary action-thong-bao'>Chỉnh sửa</button></th>
                <th>
                <button value='" . $rowThongbao['Mã thông báo'] . "' class='btn btn-primary hien-thong-bao " . $rowThongbao['Mã thông báo'] . "'>Hiển thị</button>
                <button style='display: none' value='" . $rowThongbao['Mã thông báo'] . "' class='btn btn-primary an-thong-bao " . $rowThongbao['Mã thông báo'] . "'>Ẩn</button>
                </th>
            </tr>";        
        }
    }
}
