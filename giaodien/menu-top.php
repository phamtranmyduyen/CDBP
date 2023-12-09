

<nav id="nav-menutop">
    <!-- <li><a id="menu-introduce" class="blue" data-speed="4" data-color="#39f">GIỚI THIỆU</a></li> -->
    <li><a class="blue" data-speed="4" data-color="#39f" style="cursor: pointer;">ĐIỂM CÔNG ĐOÀN</a>
        <ul id="submenu" class="submenu">
            <nav id="nav-submenu">
            </nav>
        </ul>
    </li>
    <li><a id="menu-notification" class="blue" data-speed="4" data-color="#39f">THÔNG BÁO</a></li>
    <li><a id="menu-contact" class="blue" data-speed="4" data-color="#39f">LIÊN HỆ</a></li>
    <?php
    if (isset($_SESSION['Tên tài khoản'])) {
        require_once("./DataProvider.php");
        if ($_SESSION['Quyền'] == 'AD') {
            echo "
    <li class='login'>
        <input class='tenCDBP-login' style='display: none' value = '" . $_SESSION['Tên tài khoản'] . "'/>
        <a class='blue maCDBP-login' data-speed='4' data-color='#39f' href=''>" . $_SESSION['Tên tài khoản'] . "</a>
    </li>
    <li class='logout'>
        <a class='blue' data-speed='4' data-color='#39f' href='./logout.php'>ĐĂNG XUẤT</a>
    </li>
    ";
        } else {
            $sqlMa;
            if ($_SESSION['Quyền'] == 'CTCD' || $_SESSION['Quyền'] == 'TVBCH') {
                $sqlMa = "SELECT `Mã thành viên BCH CDBP` as 'Mã', `Tên thành viên BCH CDBP` as 'Tên'
                FROM thanhvienbch
                WHERE `Tên tài khoản` = '" . $_SESSION['Tên tài khoản'] . "'";
               
            }   
            else if($_SESSION['Quyền'] == 'CDBP')
            {
                $sqlMa = "SELECT `Mã CDBP` as 'Mã', `Tên CDBP` as 'Tên'
                FROM cdbp
                WHERE `Tên tài khoản` = '" . $_SESSION['Tên tài khoản'] . "'";
            }
            $queryMa = DataProvider::executeQuery($sqlMa);
            while ($rowMa = mysqli_fetch_array($queryMa)) {
                echo "
    <li class='login'>
        <input class='tenCDBP-login' style='display: none' value = '" . $rowMa['Tên'] . "'/>
        <a id='maCDBP-login' class='blue maCDBP-login' data-speed='4' data-color='#39f'>" . $rowMa['Mã'] . "</a>
    </li>
    <li class='logout'>
        <a class='blue' data-speed='4' data-color='#39f' href='./logout.php'>ĐĂNG XUẤT</a>
    </li>
    ";
            }
        }
    } else {
        echo "
    <li class='login'>
        <a class='blue' data-speed='4' data-color='#39f' href='./index.php'>ĐĂNG NHẬP</a>
    </li>
    ";
    }
    ?>
</nav>