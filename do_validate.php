<?php
// Kết nối database
require_once('DataProvider.php');

if (isset($_POST['addTencdbp'])) {
    $addTencdbp = $_POST['addTencdbp'];
    $addTentaikhoanDaco = $_POST['addTentaikhoanDaco'];
    $error = array(
        'addTencdbp' => '',
        'addTentaikhoanDaco' => ''
    );
    // KIỂM TRA TÊN CDBP
    $sql = "SELECT COUNT(*) as 'count' 
            FROM cdbp
            WHERE `Tên CDBP` = '$addTencdbp'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] > 0) {
            $error['addTencdbp'] = "Tên công đoàn bộ phận đã tồn tại";
        }
    }
    // KIỂM TRA TÀI KHOẢN ĐÃ CÓ
    $sqlTaiKhoan = "SELECT COUNT(*) as 'count'
    FROM cdbp, thanhvienbch
    WHERE cdbp.`Tên tài khoản` = '$addTentaikhoanDaco'
    OR thanhvienbch.`Tên tài khoản` = '$addTentaikhoanDaco'";
    $queryTaiKhoan = DataProvider::executeQuery($sqlTaiKhoan);
    if ($queryTaiKhoan) {
        $rowTaiKhoan = mysqli_fetch_array($queryTaiKhoan);
        if ((int)$rowTaiKhoan['count'] > 0) {
            $error['addTentaikhoanDaco'] = "Tài khoản này đã có người dùng";
        }
    }

    echo json_encode($error);
}
if (isset($_POST['addTentaikhoanadmin'])) {
    $addTentaikhoanadmin = $_POST['addTentaikhoanadmin'];
    $sql = "SELECT COUNT(*) as 'count' 
            FROM taikhoan
            WHERE `Tên tài khoản` = '$addTentaikhoanadmin'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] > 0) {
            echo "Tên tài khoản đã tồn tại";
        }
    }
}
if (isset($_POST['addMadonvi'])||isset($_POST['addTendonvi']) || isset($_POST['addSodienthoaidonvi']) || isset($_POST['addEmaildonvi'])) {
    $madonvi = $_POST['addMadonvi'];
    $addTendonvi = $_POST['addTendonvi'];
    $addSodienthoaidonvi = $_POST['addSodienthoaidonvi'];
    $addEmaildonvi = $_POST['addEmaildonvi'];
    $error = array(
        'addTendonvi' => '',
        'addSodienthoaidonvi' => '',
        'addEmaildonvi' => '',
    );
    // KTRA TÊN

    $sqlTen = "SELECT COUNT(*) as 'count' 
            FROM donvi
            WHERE `Tên đơn vị` = '$addTendonvi' 
            AND `Tên đơn vị` NOT IN (SELECT `Tên đơn vị`
                                    FROM donvi
                                    WHERE `Mã đơn vị` = '$madonvi')";
    
    $queryTen = DataProvider::executeQuery($sqlTen);
    if ($queryTen) {
        $rowTen = mysqli_fetch_array($queryTen);
        if ((int)$rowTen['count'] > 0) {
            $error['addTendonvi'] = "Tên đơn vị đã tồn tại";
        }
    }
    // KTRA SỐ ĐIỆN THOẠI
    $sqlSodienthoai = "SELECT COUNT(*) as 'count' 
            FROM donvi
            WHERE `Số điện thoại` = '$addSodienthoaidonvi'
            AND `Số điện thoại` NOT IN (SELECT `Số điện thoại`
                                    FROM donvi
                                    WHERE `Mã đơn vị` = '$madonvi')";
    $querySodienthoai = DataProvider::executeQuery($sqlSodienthoai);
    if ($querySodienthoai) {
        $rowSodienthoai = mysqli_fetch_array($querySodienthoai);
        if ((int)$rowSodienthoai['count'] > 0) {
            $error['addSodienthoaidonvi'] = "Số điện thoại đã tồn tại";
        }
    }
    // KTRA Email
    $sqlEmail = "SELECT COUNT(*) as 'count' 
            FROM donvi
            WHERE `Email` = '$addEmaildonvi'
            AND `Email` NOT IN (SELECT `Email`
                                    FROM donvi
                                    WHERE `Mã đơn vị` = '$madonvi')";
    $queryEmail = DataProvider::executeQuery($sqlEmail);
    if ($queryEmail) {
        $rowEmail = mysqli_fetch_array($queryEmail);
        if ((int)$rowEmail['count'] > 0) {
            $error['addEmaildonvi'] = "Email đã tồn tại";
        }
    }
    echo json_encode($error);
}
if (isset($_POST['addBchKhoa'])) {
    $addBchKhoa = $_POST['addBchKhoa'];
    $error = array(
        'addBchKhoa' => ''
    );

    $sql = "SELECT COUNT(*) as 'count' 
            FROM bch
            WHERE `Khóa` = '$addBchKhoa'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] > 0) {
            $error['addBchKhoa'] = "Khóa đã tồn tại";
        }
    }

    echo json_encode($error);
}

if (isset($_POST['addMaquyen'])) {
    $addMaquyen = $_POST['addMaquyen'];
    $error = array(
        'addMaquyen' => ''
    );

    $sql = "SELECT COUNT(*) as 'count' 
            FROM bangquyen
            WHERE `Mã quyền` = '$addMaquyen'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] > 0) {
            $error['addMaquyen'] = "Mã quyền đã tồn tại";
        }
    }

    echo json_encode($error);
}

if (isset($_POST['addTenchucnang'])) {
    $addTenchucnang = $_POST['addTenchucnang'];
    $error = array(
        'addTenchucnang' => ''
    );

    $sql = "SELECT COUNT(*) as 'count' 
            FROM chucnang
            WHERE `Tên chức năng` = '$addTenchucnang'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] > 0) {
            $error['addTenchucnang'] = "Tên chức năng đã tồn tại";
        }
    }

    echo json_encode($error);
}
if (isset($_POST['addNoidungtieuchi'])) {
    $addNoidungtieuchi = $_POST['addNoidungtieuchi'];
    $error = array(
        'addNoidungtieuchi' => ''
    );

    $sql = "SELECT COUNT(*) as 'count' 
            FROM tieuchichamdiem
            WHERE `Nội dung tiêu chí` = '$addNoidungtieuchi'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] > 0) {
            $error['addNoidungtieuchi'] = "Nội dung tiêu chí chấm điểm đã tồn tại";
        }
    }

    echo json_encode($error);
}
if (isset($_POST['addNoidungchitiettieuchi'])) {
    $addNoidungchitiettieuchi = $_POST['addNoidungchitiettieuchi'];
    $error = array(
        'addNoidungchitiettieuchi' => ''
    );

    $sql = "SELECT COUNT(*) as 'count' 
            FROM chitiettieuchichamdiem
            WHERE `Nội dung chi tiết tiêu chí` = '$addNoidungchitiettieuchi'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] > 0) {
            $error['addNoidungchitiettieuchi'] = "Nội dung chi tiết tiêu chí chấm điểm đã tồn tại";
        }
    }

    echo json_encode($error);
}
if (isset($_POST['addTvbchTen']) || isset($_POST['addTvbchSodienthoai']) || isset($_POST['addTvbchEmail'])) {
    $error = array(
        'addTvbchTen' => '',
        'addTvbchSodienthoai' => '',
        'addTvbchEmail' => '',
        'addTentaikhoanDaco' => ''
    );
    if (isset($_POST['addTvbchTen'])) {
        $addTvbchTen = $_POST['addTvbchTen'];
        // KTRA TÊN
        $sql = "SELECT COUNT(*) as 'count' 
    FROM thanhvienbch
    WHERE `Tên thành viên BCH CDBP` = '$addTvbchTen'";
        $query = DataProvider::executeQuery($sql);
        if ($query) {
            $row = mysqli_fetch_array($query);
            if ((int)$row['count'] > 0) {
                $error['addTvbchTen'] = "Họ tên đã tồn tại";
            }
        }
    }
    $addTvbchSodienthoai = $_POST['addTvbchSodienthoai'];
    $addTvbchEmail = $_POST['addTvbchEmail'];
    if (isset($_POST['addTentaikhoanDaco'])) {
        $addTentaikhoanDaco = $_POST['addTentaikhoanDaco'];
        // KIỂM TRA TÀI KHOẢN ĐÃ CÓ
        $sqlTaiKhoan = "SELECT COUNT(*) as 'count'
    FROM cdbp, thanhvienbch
    WHERE cdbp.`Tên tài khoản` = '$addTentaikhoanDaco'
    OR thanhvienbch.`Tên tài khoản` = '$addTentaikhoanDaco'";
        $queryTaiKhoan = DataProvider::executeQuery($sqlTaiKhoan);
        if ($queryTaiKhoan) {
            $rowTaiKhoan = mysqli_fetch_array($queryTaiKhoan);
            if ((int)$rowTaiKhoan['count'] > 0) {
                $error['addTentaikhoanDaco'] = "Tài khoản này đã có người dùng";
            }
        }
        if (isset($_POST['addTentaikhoan'])) {
            $addTentaikhoan = $_POST['addTentaikhoan'];
            $sql = "SELECT COUNT(*) as 'count' 
           FROM taikhoan
           WHERE `Tên tài khoản` = '$addTentaikhoan'";
            $query = DataProvider::executeQuery($sql);
            if ($query) {
                $row = mysqli_fetch_array($query);
                if ((int)$row['count'] > 0) {
                    echo "Tên tài khoản đã tồn tại";
                }
            }
        }

        if (isset($_POST['addTentaikhoanadmin'])) {
            $addTentaikhoanadmin = $_POST['addTentaikhoanadmin'];
            $error = array(
                'addTentaikhoanadmin' => ''
            );

            $sql = "SELECT COUNT(*) as 'count' 
           FROM taikhoan
           WHERE `Tên tài khoản` = '$addTentaikhoanadmin'";
            $query = DataProvider::executeQuery($sql);
            if ($query) {
                $row = mysqli_fetch_array($query);
                if ((int)$row['count'] > 0) {
                    $error['addTentaikhoanadmin'] = "Tên tài khoản đã tồn tại";
                }
            }

            echo json_encode($error);
        }
    }


    // KTRA SỐ ĐIỆN THOẠI
    $sqlSodienthoai = "SELECT COUNT(*) as 'count' 
            FROM thanhvienbch
            WHERE `Số điện thoại` = '$addTvbchSodienthoai'";
    $querySodienthoai = DataProvider::executeQuery($sqlSodienthoai);
    if ($querySodienthoai) {
        $rowSodienthoai = mysqli_fetch_array($querySodienthoai);
        if ((int)$rowSodienthoai['count'] > 0) {
            $error['addTvbchSodienthoai'] = "Số điện thoại đã tồn tại";
        }
    }
    // KTRA Email
    $sqlEmail = "SELECT COUNT(*) as 'count' 
            FROM thanhvienbch
            WHERE `Email` = '$addTvbchEmail'";
    $queryEmail = DataProvider::executeQuery($sqlEmail);
    if ($queryEmail) {
        $rowEmail = mysqli_fetch_array($queryEmail);
        if ((int)$rowEmail['count'] > 0) {
            $error['addTvbchEmail'] = "Email đã tồn tại";
        }
    }
    echo json_encode($error);
}

if (isset($_POST['passold'])) {
    $passold = $_POST['passold'];
    $tentaikhoan = $_POST['tentaikhoan'];
    $error = array(
        'testPass' => ''
    );

    $sql = "SELECT COUNT(*) as 'count' 
            FROM taikhoan
            WHERE `Tên tài khoản` = '$tentaikhoan' 
            AND `Mật khẩu` = '$passold'";
    $query = DataProvider::executeQuery($sql);
    if ($query) {
        $row = mysqli_fetch_array($query);
        if ((int)$row['count'] == 0) {
            $error['testPass'] = "Mật khẩu cũ không đúng";
        }
    }
    echo json_encode($error);
}
