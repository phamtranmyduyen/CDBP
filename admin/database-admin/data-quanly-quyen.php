
<?php
require_once('../../DataProvider.php');

if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG
$sqlLaySoLuongQuyen = "SELECT COUNT(*) AS 'Số lượng'
            FROM bangquyen";
$queryLaySoLuongQuyen = DataProvider::executeQuery($sqlLaySoLuongQuyen);
$row = mysqli_fetch_array($queryLaySoLuongQuyen);
$countDataQuyen = $row['Số lượng'];
echo "<div style='display:none' id='countquyen'>$countDataQuyen</div>";
// LOAD_DATA
$query =  DataProvider::executeQuery("SELECT *
                                    FROM bangquyen");
while ($row = mysqli_fetch_array($query)) {
    $count++;
    $maquyen = $row['Mã quyền'];
    $tenquyen = $row['Tên quyền'];
    if ($count > $start && $count <= $end) {
        echo
        "<tr>
            <td class=" . $maquyen . ">$maquyen</td>
            <td class=" . $maquyen . ">$tenquyen</td>
            <td style='text-align: center;
            justify-content: center;
            align-items: center;'><button style='border: none' class='add-quyen-chucnang' value=" . $maquyen . "><i class='far fa-list-alt'></i></button></i></td>            
            <td><button style='border: none' class='edit-quyen' value=" . $maquyen . "><i class='fas fa-edit' ></button></i></td>            
            <td><button style='border: none' class='del-quyen' value=" . $maquyen . "><i class='fas fa-trash-alt'></button></i></td>
        </tr>";
    }
}
