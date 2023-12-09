
<?php
require_once('../../DataProvider.php');
$query =  DataProvider::executeQuery("SELECT *
                                    FROM bangquyen");
                    echo "<option value='' disabled selected>Chọn quyền</option>";
while ($row = mysqli_fetch_array($query)) {
    $tenquyen = $row['Tên quyền'];
    echo
    "<option value='" .  $row['Mã quyền'] . "'>$tenquyen</option>";
}

