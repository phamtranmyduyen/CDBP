<?php 

if (isset($_SESSION['Tên tài khoản']) && $_SESSION['Tên tài khoản']) {
    $username = $_SESSION['Tên tài khoản'];
    $queryQuyen =  DataProvider::executeQuery("SELECT DISTINCT cn.`Mã chức năng`, cn.`Tên chức năng`
                FROM taikhoan tk, bangquyen q, quyen_chucnang qcn, chucnang cn
                WHERE tk.`Mã quyền`=q.`Mã quyền`
                AND qcn.`Mã quyền`=q.`Mã quyền`
                AND qcn.`Mã chức năng`=cn.`Mã chức năng`
                AND tk.`Tên tài khoản`='$username'");
    //So sánh 2 quyền
    $id=1;
    while ($rowQuyen = mysqli_fetch_array($queryQuyen)) {        
        echo
        "<li id='menu-admin-".$rowQuyen['Mã chức năng']."' style='cursor: pointer' class='btn btn-outline-primary'>
            <div class='" . $rowQuyen['Mã chức năng'] . "'>
                <a>" . $rowQuyen['Tên chức năng'] . "</a>
            </div>
            <div class='option-li-menu'>
                <i class='fas fa-angle-right'></i>
            </div>
        </li>";
        $id++;
    }
}
