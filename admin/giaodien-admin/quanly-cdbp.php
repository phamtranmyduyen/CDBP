<div class="body-quanly-cdbp">
    <div class="panner-img">
        <img src="../img/quanly-cdbp.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>

    <div class="quanly-top cdbp-top">

        <form onsubmit="return false" class="needs-validation form-add form-add-cdbp" novalidate>
            <h3>THÊM CÔNG ĐOÀN BỘ PHẬN</h3>
            <div class="row mb-3">
                <label for="input-add-tencdbp" class="col-sm-5 col-form-label">Tên công đoàn bộ phận</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="input-add-tencdbp" required>
                    <div class="error" id="error-addtencdbp">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-ngaythanhlapcdbp" class="col-sm-4 col-form-label">Ngày thành lập</label>
                <div class="col-sm-8">
                    <input autocomplete="off" type="text" class="form-control datepicker" id="input-add-ngaythanhlapcdbp" required>
                    <div class="error" id="error-addngaythanhlapcdbp">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-ngayketthuccdbp" class="col-sm-4 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-8">
                    <input autocomplete="off" type="text" class="form-control datepicker" id="input-add-ngayketthuccdbp">
                    <div class="error" id="error-addngayketthuccdbp">
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
                <label for="input-add-taikhoan" class="col-sm-6 col-form-label">Công đoàn chưa có tài khoản?</label>
                <div class="col-sm-6">
                    <input disabled type="checkbox" class="input-add-taikhoan" id="input-add-taikhoan" value="" required>
                    <input style="display: none" type="text" class="input-add-taikhoan form-check-input" id="input-add-taikhoan-test" value="" required>
                    <button class="button button-add-taikhoan" type="button">TẠO TÀI KHOẢN</button>
                    <div class="error" id="error-addtaikhoancdbp">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary submit-add submit-add-cdbp" type="submit">LƯU</button>
        </form>
        <div class="form-find form-find-cdbp">
            <span id="noti-find-cdbp"></span>
            <h3>TÌM KIẾM CÔNG ĐOÀN BỘ PHẬN</h3>
            <div class="row mb-3">
                <label for="input-findMacdbp" class="col-sm-5 col-form-label">Mã công đoàn bộ phận</label>
                <div class="col-sm-7">
                    <input class="form-control" id="input-findMacdbp" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findTencdbp" class="col-sm-5 col-form-label">Tên công đoàn bộ phận</label>
                <div class="col-sm-7">
                    <input class="form-control" id="input-findTencdbp" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findTentaikhoan" class="col-sm-5 col-form-label">Mã tài khoản</label>
                <div class="col-sm-7">
                    <input class="form-control" id="input-findTentaikhoan" type="text" />
                </div>
            </div>

        </div>
    </div>
    <div class='data-quanly cdbp'>
        <span id="noti-del-cdbp"></span>
        <table class='table-striped table table-hover table-data-quanly table-cdbp'>
            <th>Mã công đoàn bộ phận</th>
            <th>Tên công đoàn bộ phận</th>
            <th>Ngày thành lập</th>
            <th>Ngày kết thúc</th>
            <th>Tài khoản</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load_data table-hover" id="load_data_cdbp">

            </tbody>

        </table>

    </div>

    <div class='form-edit form-edit-cdbp'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI CÔNG ĐOÀN BỘ PHẬN</h2>
        <div class="mb-3">
            <label for="form-edit-macdbp-input" class="form-label">Mã công đoàn bộ phận</label>
            <input type="text" class="form-control" id="form-edit-macdbp-input" disabled>
        </div>
        <div class="mb-3">
            <label for="form-edit-tencdbp-input" class="form-label">Tên công đoàn bộ phận</label>
            <input type="text" class="form-control" id="form-edit-tencdbp-input">
        </div>
        <div class="mb-3">
            <label for="form-edit-ngaythanhlap-input" class="form-label">Ngày thành lập</label>
            <input type="date" class="form-control" id="form-edit-ngaythanhlap-input">
        </div>
        <div class="mb-3">
            <label for="form-edit-ngayketthuc-input" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" id="form-edit-ngayketthuc-input">
        </div>
        <button class="btn btn-primary submitEdit submitEditCdbp">THAY ĐỔI</button>
    </div>

    <div class="taikkhoan-cdbp">
        <?php require('form-add-taikhoan.php'); ?>
    </div>
</div>

<script>
    validate();
    quanlyCdbp();
</script>
<script>
    $(function() {
        $(".datepicker").datepicker();
    });
</script>