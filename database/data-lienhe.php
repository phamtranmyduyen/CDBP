<?php
require_once('../DataProvider.php');
$sql = "SELECT DISTINCT ch.`Khóa`,  ch.`Mã ban chấp hành CDBP`
FROM bch ch, thanhvienbch tv
WHERE ch.`Mã ban chấp hành CDBP`= tv.`Mã ban chấp hành CDBP`";
$result = DataProvider::executeQuery($sql);
while ($row = mysqli_fetch_array($result)) {
    $bien = $row['Mã ban chấp hành CDBP'];
    echo
    "<h4><span><strong>Khóa " . $row['Khóa'] . "</strong></span></h4>";

    $sql1 = "SELECT DISTINCT * 
            FROM thanhvienbch tv 
            WHERE tv.`Mã ban chấp hành CDBP`='$bien'";
    $result1 = DataProvider::executeQuery($sql1);
    echo "
    <table class='table table-striped table-hover'> 
    <thead>
        <th>Họ và tên</th>
        <th>Chức vụ</th>
        <th>Số điện thoại</th>
        <th>Email</th>
    </thead><tbody>";
    while ($row1 = mysqli_fetch_array($result1)) {
        echo
        "<tr>
                <td>" . $row1['Tên thành viên BCH CDBP'] . "</td>
                <td>" . $row1['Chức vụ'] . "</td>
                <td>0" . $row1['Số điện thoại'] . "</td>
                <td>" . $row1['Email'] . "</td>
            </tr> ";
    }
    echo "</tbody></table>";
}
