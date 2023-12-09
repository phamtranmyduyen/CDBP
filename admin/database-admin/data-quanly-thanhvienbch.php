
<?php
require_once('../../DataProvider.php');
if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG 
$sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
            FROM thanhvienbch";
$queryLaySoLuong = DataProvider::executeQuery($sqlLaySoLuong);

$row = mysqli_fetch_array($queryLaySoLuong);
$countData = $row['Số lượng'];
echo "<div style='display:none' id='countthanhvienbch'>$countData</div>";

// LOAD_DATA_CDBP
$query =  DataProvider::executeQuery("SELECT *
                                    FROM thanhvienbch");
while ($row = mysqli_fetch_array($query)) {
    $count++;

    if ($count > $start && $count <= $end) {
        echo
        "    
        <tr>
            <td class='" . $row['Mã thành viên BCH CDBP'] . "'>" . $row['Mã thành viên BCH CDBP'] . "</td>
            <td class='" . $row['Mã thành viên BCH CDBP'] . "'>" . $row['Tên thành viên BCH CDBP'] . "</td>
            <td class='" . $row['Mã thành viên BCH CDBP'] . "'>" . $row['Chức vụ'] . "</td>
            <td class='" . $row['Mã thành viên BCH CDBP'] . "'>0" . $row['Số điện thoại'] . "</td>
            <td class='" . $row['Mã thành viên BCH CDBP'] . "'>" . $row['Email'] . "</td>
            <td class='" . $row['Mã thành viên BCH CDBP'] . "'>" . $row['Mã ban chấp hành CDBP'] . "</td>
            <td class='" . $row['Mã thành viên BCH CDBP'] . "'>
            " . $row['Tên tài khoản'] . "
                <div class='d-grid gap-2 d-md-flex justify-content-md-end'>

                <button class='detail-taikhoan btn btn-outline-primary' value=" . $row['Tên tài khoản'] . ">Xem chi tiết</button>
                <button class='edit-detail-taikhoan btn btn-outline-primary' value=" . $row['Tên tài khoản'] . ">Chỉnh sửa tài khoản</button>
                </div>
                </td>
            <td><button style='border: none' class='edit-thanhvienbch' value=" .  $row['Mã thành viên BCH CDBP']. "><i class='fas fa-edit' ></i></button></td>
            <td><button style='border: none' class='del-thanhvienbch' value=" .  $row['Mã thành viên BCH CDBP'] . "><i class='fas fa-trash-alt'></i></button></td>
        </tr>";
    }
}
