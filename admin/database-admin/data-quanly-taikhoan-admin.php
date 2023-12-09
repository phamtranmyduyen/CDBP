
<?php
require_once('../../DataProvider.php');
if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG 
$sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
            FROM taikhoan";
$queryLaySoLuong = DataProvider::executeQuery($sqlLaySoLuong);

$row = mysqli_fetch_array($queryLaySoLuong);
$countData = $row['Số lượng'];
echo "<div style='display:none' id='counttaikhoan-admin'>$countData</div>";

// LOAD_DATA
$query =  DataProvider::executeQuery("SELECT *
                                    FROM taikhoan");
while ($row = mysqli_fetch_array($query)) {
    $count++;

    if ($count > $start && $count <= $end) {
        echo
        "    
        <tr>
            <td class='" . $row['Tên tài khoản'] . "'>" . $row['Tên tài khoản'] . "</td>
            <td class='" . $row['Tên tài khoản'] . "'>" . $row['Mật khẩu'] . "</td>
            <td class='" . $row['Tên tài khoản'] . "'>" . $row['Mã quyền'] . "</td>        
            <td><button style='border: none' class='edit-taikhoan-admin' value=" .  $row['Tên tài khoản']. "><i class='fas fa-edit' ></i></button></td>
            <td><button style='border: none' class='del-taikhoan-admin' value=" .  $row['Tên tài khoản'] . "><i class='fas fa-trash-alt'></i></button></td>
        </tr>";
    }
}
