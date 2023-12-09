<?php
require_once('../DataProvider.php');
$maCDBP = $_POST['macdbp'];
$count = 0;
$sqlTenCDBP = "SELECT `Tên CDBP`
                    FROM cdbp
                    WHERE `Mã CDBP` = '$maCDBP'";
$queryTenCDBP = DataProvider::executeQuery($sqlTenCDBP);
$rowTenCDBP = mysqli_fetch_array($queryTenCDBP);
echo "<h2>" . $rowTenCDBP['Tên CDBP'] . "</h2>";
$sqlCacBangDiem = "SELECT *
                    FROM bangchamdiem bcd
                    WHERE bcd.`Mã CDBP` = '$maCDBP'";
$queryCacBangDiem = DataProvider::executeQuery($sqlCacBangDiem);

echo "<table class='table-striped table table-hover table-danhsach-bangchamdiem-theocongdoan'>
<tr>
    <th>STT</th>
    <th>Mã bảng điểm</th>
    <th>Thời gian</th>
    <th>Trạng thái</th>
    <th>Người chấm</th>
    <th>Người chỉnh sửa</th>
    <th>Xem</th>
    <th>Khóa</th>
</tr>
<tbody class='table-hover load-data-table-danhsach-bangchamdiem-theocongdoan' id='load-data-table-danhsach-bangchamdiem-theocongdoan'>";
$i = 0;
while ($rowCacBangDiem = mysqli_fetch_array($queryCacBangDiem)) {
    $i++;
    if ($rowCacBangDiem['Mã BCH chấm'] != '' && $rowCacBangDiem['Mã BCH chỉnh sửa'] != '') {
        // MÃ THÀNH VIÊN BCH
        $sqlMaBCH = "SELECT `Tên thành viên BCH CDBP`
                FROM thanhvienbch
                WHERE `Mã thành viên BCH CDBP` = '" . $rowCacBangDiem['Mã BCH chấm'] . "'";
        $queryMaBCH = DataProvider::executeQuery($sqlMaBCH);
        // MÃ THÀNH VIÊN BCH EDIT
        $sqlMaBCHEdit = "SELECT `Tên thành viên BCH CDBP`
                FROM thanhvienbch
                WHERE `Mã thành viên BCH CDBP` = '" . $rowCacBangDiem['Mã BCH chỉnh sửa'] . "'";
        $queryMaBCHEdit = DataProvider::executeQuery($sqlMaBCHEdit);
        while ($rowMaBCH = mysqli_fetch_array($queryMaBCH)) {
            while ($rowMaBCHEdit = mysqli_fetch_array($queryMaBCHEdit)) {
                $count++;
                echo "
    <tr>
        <th>$i</th>
        <th>" . $rowCacBangDiem['Mã bảng chấm điểm'] . "</th>
        <th>" . $rowCacBangDiem['Thời gian'] . "</th>
        <th>" . $rowCacBangDiem['Trạng thái'] . "</th>
        <th>" . $rowMaBCH['Tên thành viên BCH CDBP'] . "</th>
        <th>" . $rowMaBCHEdit['Tên thành viên BCH CDBP'] . "</th>
        <th><button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-outline-primary btn-sm show-detail-table-danhsach-bangchamdiem-theocongdoan'>Xem</button></th>
        <th>
            <button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary khoa-bang-diem'>Khóa</button>
            <button style='display: none' value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary mo-khoa-bang-diem'>Mở khóa</button>
        </th>
        </tr>";
            }
        }
    } else if ($rowCacBangDiem['Mã BCH chấm'] == '' && $rowCacBangDiem['Mã BCH chỉnh sửa'] != '') {
        // MÃ THÀNH VIÊN BCH EDIT
        $sqlMaBCHEdit = "SELECT `Tên thành viên BCH CDBP`
        FROM thanhvienbch
        WHERE `Mã thành viên BCH CDBP` = '" . $rowCacBangDiem['Mã BCH chỉnh sửa'] . "'";
        $queryMaBCHEdit = DataProvider::executeQuery($sqlMaBCHEdit);
        while ($rowMaBCHEdit = mysqli_fetch_array($queryMaBCHEdit)) {
            $count++;
            echo "
                <tr>
                <th>$i</th>
                <th>" . $rowCacBangDiem['Mã bảng chấm điểm'] . "</th>
                <th>" . $rowCacBangDiem['Thời gian'] . "</th>
                <th>" . $rowCacBangDiem['Trạng thái'] . "</th>
                <th></th>
                <th>" . $rowMaBCHEdit['Tên thành viên BCH CDBP'] . "</th>
                <th><button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-outline-primary btn-sm show-detail-table-danhsach-bangchamdiem-theocongdoan'>Xem</button></th>
        <th>
            <button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary khoa-bang-diem'>Khóa</button>
            <button style='display: none' value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary mo-khoa-bang-diem'>Mở khóa</button>
        </th>
        </tr>";
        }
    } else if ($rowCacBangDiem['Mã BCH chấm'] != '' && $rowCacBangDiem['Mã BCH chỉnh sửa'] == '') {
        // MÃ THÀNH VIÊN BCH
        $sqlMaBCH = "SELECT `Tên thành viên BCH CDBP`
                FROM thanhvienbch
                WHERE `Mã thành viên BCH CDBP` = '" . $rowCacBangDiem['Mã BCH chấm'] . "'";
        $queryMaBCH = DataProvider::executeQuery($sqlMaBCH);
        while ($rowMaBCH = mysqli_fetch_array($queryMaBCH)) {
            $count++;
            echo "
                <tr>
                <th>$i</th>
                <th>" . $rowCacBangDiem['Mã bảng chấm điểm'] . "</th>
                <th>" . $rowCacBangDiem['Thời gian'] . "</th>
                <th>" . $rowCacBangDiem['Trạng thái'] . "</th>
                <th>" . $rowMaBCH['Tên thành viên BCH CDBP'] . "</th>
                <th></th>
                <th><button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-outline-primary btn-sm show-detail-table-danhsach-bangchamdiem-theocongdoan'>Xem</button></th>
        <th>
            <button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary khoa-bang-diem'>Khóa</button>
            <button style='display: none' value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary mo-khoa-bang-diem'>Mở khóa</button>
        </th>
        </tr>";
        }
    } else {
        $count++;
        echo "
        <tr>
        <th>$i</th>
        <th>" . $rowCacBangDiem['Mã bảng chấm điểm'] . "</th>
        <th>" . $rowCacBangDiem['Thời gian'] . "</th>
        <th>" . $rowCacBangDiem['Trạng thái'] . "</th>
        <th></th>
        <th></th>
        <th><button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-outline-primary btn-sm show-detail-table-danhsach-bangchamdiem-theocongdoan'>Xem</button></th>
        <th>
            <button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary khoa-bang-diem'>Khóa</button>
            <button style='display: none' value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary mo-khoa-bang-diem'>Mở khóa</button>
        </th>
        </tr>";
    }
}
echo "</tbody>
</table>";
