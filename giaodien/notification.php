<?php
session_start();
if (!isset($_SESSION['Tên tài khoản'])) {
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
} ?>
  <div class="panner-img">
        <div>
            <img src="./img/notification-background.png" />
        </div>
        <div>
            <img src="./img/notification-text.png" />
        </div>
    </div>
<div class="filter-notification">
    <select id="filter" class="form-select" aria-label="Default select example">
        <option value="filter">Sắp xếp</option>
        <option value="new">Mới nhất</option>
        <option value="old">Cũ nhất</option>
    </select>
</div>
<div class="body-notification">
    <!-- <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Accordion Item #1
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>        
    </div> -->
</div>
<script>
    notification();
</script>