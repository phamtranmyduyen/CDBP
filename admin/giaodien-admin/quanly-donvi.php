
<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-donvi">
    <div class="panner-img">
        <img src="../img/quanly-donvi.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top donvi-top">
        <form onsubmit="return false" class="needs-validation form-add form-add-donvi" novalidate>
            <h3>THÊM ĐƠN VỊ</h3>
            <div class="row mb-3">
                <label for="input-add-tendonvi" class="col-sm-4 col-form-label">Tên đơn vị</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-tendonvi" required>
                    <div class="error" id="error-addtendonvi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-diachidonvi" class="col-sm-4 col-form-label">Địa chỉ</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-diachidonvi" required>
                    <div class="error" id="error-adddiachidonvi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-sodienthoaidonvi" class="col-sm-4 col-form-label">Số điện thoại</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-sodienthoaidonvi" required>
                    <div class="error" id="error-addsodienthoaidonvi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-emaildonvi" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-emaildonvi" required>
                    <div class="error" id="error-addemaildonvi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="list-cdbp" class="col-sm-4 col-form-label">Thuộc công đoàn</label>
                <div class="col-sm-8">
                    <select class='form-select list-cdbp' required>

                    </select>
                    <div class="error" id="error-add-congdoan">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>

            <button class="btn btn-primary submit-add submit-add-donvi" type="submit">THÊM</button>

        </form>
        <div class="form-find form-find-donvi">
            <span id="noti-find-donvi"></span>
            <h3>TÌM KIẾM QUYỀN</h3>
            <div class="row mb-3">
                <label for="input-findMadonvi" class="col-sm-4 col-form-label">Mã đơn vị</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findMadonvi" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findTendonvi" class="col-sm-4 col-form-label">Tên đơn vị</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findTendonvi" type="text" />
                </div>
            </div>
        </div>
    </div>
    <div class='data-quanly donvi'>
        <table class='table-striped table table-hover table-data-quanly table-donvi'>
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Thuộc CĐBP</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load_data table-hover" id="load_data_donvi">

            </tbody>

        </table>
    </div>

    <div class='form-edit-donvi form-edit'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI ĐƠN VỊ</h2>
        <div class="mb-3">
            <label for="form-edit-madonvi-input">Mã đơn vị</label>
            <input type="text" class="form-control" id="form-edit-madonvi-input" required disabled>
            <div class="error" id="error-editmadonvi">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-tendonvi-input">Tên đơn vị</label>
            <input type="text" class="form-control" id="form-edit-tendonvi-input" required>
            <div class="error" id="error-edittendonvi">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-diachi-input">Địa chỉ</label>
            <input type="text" class="form-control" id="form-edit-diachi-input" required>
            <div class="error" id="error-editdiachidonvi">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-sodienthoai-input">Số điện thoại</label>
            <input type="text" class="form-control" id="form-edit-sodienthoai-input" required>
            <div class="error" id="error-editsodienthoaidonvi">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-email-input">Email</label>
            <input type="text" class="form-control" id="form-edit-email-input" required>
            <div class="error" id="error-editemaildonvi">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="list-cdbp">Thuộc công đoàn</label>
            <select id="list-cdbp" class='list-cdbp'>

            </select>
            <div class="error" id="error-edit-congdoan">
                <!-- Looks good! -->
            </div>
        </div>
        <button class="btn btn-primary submitEditdonvi">THAY ĐỔI</button>
    </div>

</div>
<script>
     validate();
    quanlyDonvi();
</script>
