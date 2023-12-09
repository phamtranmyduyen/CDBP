
<?php
require_once('../../DataProvider.php');
$query =  DataProvider::executeQuery("SELECT `Nội dung tiêu chí`
                                    FROM tieuchichamdiem");
                    echo "<option value='' selected disabled>Chọn tiêu chí</option>";
while ($row = mysqli_fetch_array($query)) {
    $tentieuchi = $row['Nội dung tiêu chí'];
    echo
    "<option value='" . $tentieuchi . "'>$tentieuchi</option>";
}

