<?php session_start(); 
if (isset($_SESSION['Tên tài khoản'])){
    unset($_SESSION['Tên tài khoản']); // xóa session login
    echo "<script language='javascript'>window.location='./index.php'</script>";
}
?>