
<?php
require_once('../../DataProvider.php');
$query =  DataProvider::executeQuery("SELECT `Tên CDBP`
                                    FROM cdbp");
                              
                    echo "<option disabled selected value=''>Chọn công đoàn</option>";
while ($row = mysqli_fetch_array($query)) {
    $tencdbp = $row['Tên CDBP'];
    echo
    "<option value='" . $tencdbp . "'>$tencdbp</option>";
}

