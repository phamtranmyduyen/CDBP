<?php
//Khai báo sử dụng session
session_start();


require_once('./DataProvider.php');

//Lấy dữ liệu nhập vào
$username = $_POST['username'];
$password = $_POST['password'];


//Kiểm tra tên đăng nhập có tồn tại không
$query = DataProvider::executeQuery("SELECT tk.`Tên tài khoản`, tk.`Mật khẩu` 
                                        FROM taikhoan tk
                                        WHERE BINARY tk.`Tên tài khoản`='$username'");                                 
if (mysqli_num_rows($query) == 0) {
    echo "Tên đăng nhập này không tồn tại";
    exit;
}
if (mysqli_num_rows($query) == 1) {
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
    
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['Mật khẩu']) {
        echo "Mật khẩu không đúng";
        exit;
    }
    // mã hóa pasword
    $password = md5($password);
    //Lưu tên đăng nhập
    $_SESSION['loggedIn'] = true;
    $_SESSION['Tên tài khoản'] = $username;
    
    $queryQuyen =  DataProvider::executeQuery("SELECT DISTINCT q.`Mã quyền`
                FROM taikhoan tk, bangquyen q
                WHERE tk.`Mã quyền`=q.`Mã quyền`
                AND tk.`Tên tài khoản`='" . $_SESSION['Tên tài khoản'] . "'");
    $row = mysqli_fetch_array($queryQuyen);
    $_SESSION['Quyền'] = $row['Mã quyền'];
    
    if ($_SESSION['Quyền'] == 'CDBP') {
        // echo "echo '<script language='javascript'>window.location='./index.php'</script>'";
        echo "CDBP";
    } else if ($_SESSION['Quyền'] == 'AD') {
        // echo "echo '<script language='javascript'>window.location='./admin/admin.php'</script>'";
        echo "AD";
    } else if ($_SESSION['Quyền'] == 'TVBCH') {
        // echo "echo '<script language='javascript'>window.location='./index-TVBCH.php'</script>'";
        echo "TVBCH";
    }
    else if ($_SESSION['Quyền'] == 'CTCD') {
        // echo "echo '<script language='javascript'>window.location='./index-TVBCH.php'</script>'";
        echo "CTCD";
    }
}

die();
