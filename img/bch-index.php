<?php
session_start();
if (!isset($_SESSION['Tên tài khoản'])) {

    echo "<script>Swal.fire('Bạn hiện không xem được nội dung này. Hãy đăng nhập!')
    
    document.querySelector('.swal2-container').onclick = function() {
        window.location = '../login.php';
    }
    document.querySelector('.swal2-confirm').onclick = function() {
        window.location = '../login.php';
    }
    </script>";
} else {
    if (isset($_SESSION['Quyền']) && ($_SESSION['Quyền'] != 'AD') && ($_SESSION['Quyền'] != 'TVBCH')) {
        echo "<script>Swal.fire('Bạn hiện không truy cập được vào trang này. Hãy đăng nhập!')
        document.querySelector('.swal2-container').onclick = function() {
            window.location = '../login.php';
        }
        document.querySelector('.swal2-confirm').onclick = function() {
            window.location = '../login.php';
        }
        </script>";
    }
}

?>
<input type="checkbox" id="check" />
<label class="check-label" for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
</label>
<div class="slidebar">
    <header class="slidebar-header"><a style="text-decoration: none; color: red" href="admin.php">CÔNG ĐOÀN SGU</a></header>
    <ul>
    <?php require_once('../DataProvider.php'); ?>

        <?php require('database-admin/data-bch-menu.php'); ?>
        <script>
            var sections = document.querySelectorAll('.btn-outline-primary');
            for (let i = 0; i < sections.length; i++) {
                sections[i].classList.remove('btn');
                sections[i].classList.remove('btn-outline-primary');
            }
            var optionLiMenu = document.querySelectorAll('.option-li-menu')
            for (let j = 0; j < optionLiMenu.length; j++) {

                optionLiMenu[j].style.display = 'none';
            }
        </script>
        <li id="logout-admin"><a href="../logout.php">Đăng xuất</a></li>
    </ul>
</div>
<div class="content-admin">

</div>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item" id="prevPage">
            <a class="page-link" aria-label="Previous" style="cursor:pointer">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item" id="page" style="display: flex">
        </li>
        <li class="page-item" id="nextPage">
            <a class="page-link" aria-label="Next" style="cursor:pointer">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>