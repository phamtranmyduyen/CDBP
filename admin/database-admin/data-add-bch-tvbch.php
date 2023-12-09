
<?php
require_once('../../DataProvider.php');
$query =  DataProvider::executeQuery("SELECT `Mã ban chấp hành CDBP`
                                    FROM bch");
                              
                    echo "<option disabled selected value=''>Chọn ban chấp hành</option>";
while ($row = mysqli_fetch_array($query)) {
    $ma = $row['Mã ban chấp hành CDBP'];
    echo
    "<option value='$ma'>$ma</option>";
}

