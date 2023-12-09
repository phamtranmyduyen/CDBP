<?php
session_start();
if (!isset($_SESSION['Tên tài khoản']) || $_SESSION['Tên tài khoản'] == '') {
    echo "
    <script>
        Swal.fire('Bạn hiện không xem được nội dung này. Hãy đăng nhập để xem nội dung!');
        click = false;
        document.querySelector('.swal2-confirm').onclick = function() {
            window.location = './index.php';
            click = true;
        }
        console.log(click);
        window.onclick=function() {
            if(click == false)
                location.reload();
        }
    
    </script>";
} 
?>
<script>
    countDate = 0;
</script>


<div class=rank>
    <div class="panner-img">
        <div>
            <img src="./img/rank-background.png" />
        </div>
        <div>
            <img src="./img/rank-text.png" />
        </div>
    </div>
    <div class="rank-content">
        <!-- <h4 style="font-weight: bold;">BẢNG XẾP HẠNG CÔNG ĐOÀN BỘ PHẬN</h4> -->
        <div class="khung">
            <button class='btn btn-primary' onclick="rankAll()">
                XẾP HẠNG TỔNG
            </button>
            <button class='btn btn-outline-success' onclick="selectDateRank()">
                Bộ lọc <i class="fas fa-angle-down"></i>
            </button>
            <div class="filter-rank">
                <select id="filter-rank" class="form-select">
                    <option value="filter">Sắp xếp</option>
                    <option value="low">Thấp -> Cao</option>
                    <option value="high">Cao -> Thấp</option>
                </select>
            </div>
        </div>
        <div class="date-xephang">
            <div class="xephang-tungay">
                <p>Từ ngày</p><input type="date" class="form-rank" id="input-rank-tungay">
            </div>
            <div class="xephang-denngay">
                <p>Đến ngày</p><input type="date" class="form-rank" id="input-rank-denngay">
            </div>

            <button class="find-rank">
                <i class="fas fa-search"></i>
            </button>

        </div>
        <div id="main-rank">
            <table class='table-rank table table-striped table-hover'>
                <tr>
                    <th width='25%' style='height:85px; text-align:left; padding-left: 5% ; color:red'>Hạng</th>
                    <th width='50%' style='height:85px; color:red'>Tên công đoàn bộ phận</th>
                    <th width='25%' style='height:85px; color:red'>Tổng điểm</th>
                </tr>
                <tbody class="table-hover load-data" id="load-data-rank">

                </tbody>

            </table>
        </div>
    </div>
</div>
<nav id="action-page" aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" id="prevPage" aria-label="Previous" style="cursor:pointer">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item" id="page" style="display: flex">
        </li>
        <li class="page-item">
            <a class="page-link" id="nextPage" aria-label="Next" style="cursor:pointer">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<script>
    rank();
</script>