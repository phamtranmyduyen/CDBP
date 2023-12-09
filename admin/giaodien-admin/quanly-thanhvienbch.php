<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-thanhvienbch">
    <div class="panner-img">
        <img src="../img/quanly-thanhvienbch.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top thanhvienbch-top">
        <form onsubmit="return false" class="needs-validation form-add form-add-thanhvienbch" novalidate>
            <h3>THÊM THÀNH VIÊN BAN CHẤP HÀNH</h3>
            <div class="row mb-3">
                <label for="input-add-thanhvienbch-ten" class="col-sm-4 col-form-label">Họ tên</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-thanhvienbch-ten" required>
                    <div class="error" id="error-addthanhvienbchten">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-thanhvienbch-chucvu" class="col-sm-4 col-form-label">Chức vụ</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-thanhvienbch-chucvu" required>
                    <div class="error" id="error-addthanhvienbchchucvu">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-thanhvienbch-sodienthoai" class="col-sm-4 col-form-label">Số điện thoại</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-thanhvienbch-sodienthoai" required>
                    <div class="error" id="error-addthanhvienbchsodienthoai">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-thanhvienbch-email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-thanhvienbch-email" required>
                    <div class="error" id="error-addthanhvienbchemail">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="list-bch" class="col-sm-4 col-form-label">Thuộc ban chấp hành</label>
                <div class="col-sm-8">
                    <select id="list-bch" class='form-select list-bch' required>

                    </select>
                    <div class="error" id="error-addmabch">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-taikhoan" class="col-sm-4 col-form-label">Tài khoản</label>
                <div class="col-sm-8">
                    <select class="form-select list-taikhoan" id="list-taikhoan">

                    </select>
                    <div class="error" id="error-addtaikhoancdbp-daco">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-taikhoan" class="col-sm-6 col-form-label">Thành viên chưa có tài khoản?</label>
                <div class="col-sm-6">
                    <input disabled type="checkbox" class="input-add-taikhoan" id="input-add-taikhoan" value="" required>
                    <input style="display: none" type="text" class="input-add-taikhoan form-check-input" id="input-add-taikhoan-test" value="" required>
                    <button class="button button-add-taikhoan" type="button">TẠO TÀI KHOẢN</button>
                    <div class="error" id="error-addtaikhoancdbp">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>

            <button class="btn btn-primary submit-add submit-add-thanhvienbch">THÊM</button>
        </form>
        <div class="form-find form-find-thanhvienbch">
            <h3>TÌM KIẾM THÀNH VIÊN BAN CHẤP HÀNH</h3>
            <div class="row mb-3">
                <label for="input-findMathanhvienbch" class="col-sm-4 col-form-label">Mã thành viên BCH</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findMathanhvienbch" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findTenthanhvienbch" class="col-sm-4 col-form-label">Tên thành viên BCH</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findTenthanhvienbch" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findBch" class="col-sm-4 col-form-label">Thuộc ban chấp hành</label>
                <div class="col-sm-8">
                    <select id="input-findBch" class='form-select list-bch' required>

                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class='data-quanly thanhvienbch'>
        <table class='table-striped table table-hover table-data-quanly table-thanhvienbch'>
            <th>Mã thành viên BCH</th>
            <th>Họ tên</th>
            <th>Chức vụ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Thuộc BCH</th>
            <th>Tài khoản</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load-data table-hover" id="load_data_thanhvienbch">

            </tbody>

        </table>
    </div>

    <div class='form-edit form-edit-thanhvienbch'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI THÀNH VIÊN BCH</h2>

        <div class="mb-3">
            <label for="form-edit-mathanhvienbch-input" class="form-label">Mã thành viên BCH</label>
            <input type="text" class="form-control" id="form-edit-mathanhvienbch-input" disabled type="text" value="<?php echo $row['Mã thành viên BCH CDBP']; ?>">
            <div class="error" id="error-editthanhvienbchma">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-tenthanhvienbch-input" class="form-label">Tên thành viên BCH</label>
            <input type="text" class="form-control" id="form-edit-tenthanhvienbch-input" type="text" value="<?php echo $row['Tên thành viên BCH CDBP']; ?>">
            <div class="error" id="error-editthanhvienbchten">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-chucvubch-input" class="form-label">Chức vụ</label>
            <input type="text" class="form-control" id="form-edit-chucvubch-input" type="text" value="<?php echo $row['Chức vụ']; ?>">
            <div class="error" id="error-editthanhvienbchchucvu">
                <!-- Looks good! -->
            </div>
        </div>


        <div class="mb-3">
            <label for="form-edit-sodienthoaibch-input" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="form-edit-sodienthoaibch-input" type="text" value="<?php echo $row['Số điện thoại']; ?>">
            <div class="error" id="error-editthanhvienbchsodienthoai">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-emailbch-input" class="form-label">Email</label>
            <input type="text" class="form-control" id="form-edit-emailbch-input" type="text" value="<?php echo $row['Email']; ?>">
            <div class="error" id="error-editthanhvienbchemail">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="list-data">
            <label for="list-bch-edit" class="form-label">Thuộc ban chấp hành</label>
            <select id="list-bch-edit" class='form-select list-bch' required>

            </select>
            <div class="error" id="error-editthanhvienbchBCH">
                <!-- Looks good! -->
            </div>
        </div>

        <button class="btn btn-primary submitEditThanhvienbch">THAY ĐỔI</button>
    </div>
    <div class="taikkhoan-bch">
        <?php require('form-add-taikhoan.php'); ?>
    </div>
</div>
<script>
    validate();
    quanlyThanhvienBCH();
</script>