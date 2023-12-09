
<?php 
require_once('../../DataProvider.php');
$query =  DataProvider::executeQuery("SELECT *
                                    FROM chucnang");
    while ($row = mysqli_fetch_array($query)) {
        $tenchucnang = $row['Tên chức năng'];
        echo 
        "<div class='chucnang-thanhphan'>            
            <input class='checkChucnang form-check-input' id='checkChucnang' name='checkChucnang' type='checkbox' value='".$tenchucnang."'/>
            <label class='form-check-label'>".$tenchucnang."</label>
        </div>"

        ;
    }

