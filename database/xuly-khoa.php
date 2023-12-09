<?php
require('giaodien/khoa-chucnang-chamdiem.php');
?>
<script>
    document.querySelector('.quanly-chucnang-chamdiem').style.display = 'none';
    var khoatudong = document.querySelector('#khoatudong-input').checked;
    console.log(khoatudong);
    if (khoatudong == true) {
        Swal.fire('Bạn hiện không xem được nội dung này. Hãy đăng nhập để xem nội dung!')
        document.querySelector('.swal2-confirm').onclick = function() {
        window.location = './cdbp.php';
        }

    } else {
        require('point-CDBP.php');
    }
</script>