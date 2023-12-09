
<?php
require_once('../../DataProvider.php');
$mabch = $_POST['mabch'];
$query =  DataProvider::executeQuery("SELECT *
                                    FROM thanhvienbch tv
                                    WHERE tv.`Mã ban chấp hành CDBP` = '$mabch'");
echo "
    <table class='table-tv-bch table-dark table-striped table table-hover'> 
    <tr>
        <th>Họ và tên</th>
        <th>Chức vụ</th>
        <th>Số điện thoại</th>
        <th>Email</th>
    </tr>
    <tbody class='table-hover'>";
while ($row = mysqli_fetch_array($query)) {
        echo
        "<tr>
            <td>" . $row['Tên thành viên BCH CDBP'] . "</td>
            <td>" . $row['Chức vụ'] . "</td>
            <td>" . $row['Số điện thoại'] . "</td>
            <td>" . $row['Email'] . "</td>
        </tr> ";
    }
    echo "</tbody></table>";;
