
<?php
require_once('../../DataProvider.php');
$query =  DataProvider::executeQuery("SELECT `Tên tài khoản`
                                    FROM taikhoan");
                              
                    echo "<option selected value=''>Chọn tài khoản</option>";
while ($row = mysqli_fetch_array($query)) {
    $ma = $row['Tên tài khoản'];
    echo
    "<option value='$ma'>$ma</option>";
}

