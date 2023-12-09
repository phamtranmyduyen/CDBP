
<?php
require_once('../../DataProvider.php');
$tentaikhoan = $_POST['tentaikhoan'];
$query =  DataProvider::executeQuery("SELECT *
                                    FROM taikhoan tk
                                    WHERE tk.`Tên tài khoản` = '$tentaikhoan'");
while ($row = mysqli_fetch_array($query)) {
    echo
    "
        <div>
            <label for='tentaikhoan'>Tên tài khoản: </label>
            <h3 id='tentaikhoan' class=" . $row['Tên tài khoản'] . ">" . $row['Tên tài khoản'] . "</h3>
        </div>
        <div>
            <label for='matkhau'>Mật khẩu: </label>
            <h3 id='matkhau' class=" . $row['Tên tài khoản'] . ">" . $row['Mật khẩu'] . "</h3>
        </div>
        <div>
        <label for='maquyen'>Quyền: </label>
            <h3 id='maquyen' class=" . $row['Tên tài khoản'] . ">" . $row['Mã quyền'] . "</h3>
        </div>
        ";
}
