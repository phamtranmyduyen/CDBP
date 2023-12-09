<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-chucnang">
    <div class="panner-img">
        <img src="../img/quanly-chucnang.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top chucnang-top">
        <form onsubmit="return false" class="needs-validation form-add form-add form-add-chucnang" novalidate>
            <h3>THÊM CHỨC NĂNG</h3>
            <div class="row mb-3">
                <label for="input-add-tenchucnang" class="col-sm-4 col-form-label">Tên chức năng</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-tenchucnang" required>
                    <div class="error" id="error-addtenchucnang">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary submit-add submit-add-chucnang" type="submit">THÊM</button>
        </form>
        <div class="form-find form-find-chucnang">
            <span id="noti-find-chucnang"></span>
            <h3>TÌM KIẾM CHỨC NĂNG</h3>
            <div class="row mb-3">
                <label for="input-findMachucnang" class="col-sm-4 col-form-label">Mã chức năng</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findMachucnang" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findTenchucnang" class="col-sm-4 col-form-label">Tên chức năng</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findTenchucnang" type="text" />
                </div>
            </div>
        </div>
    </div>
    <div class='data-quanly chucnang'>
        <table class='table-striped table table-hover table-data-quanly table-chucnang'>
            <th>Mã chức năng</th>
            <th>Tên chức năng</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load_data" id="load_data_chucnang">

            </tbody>

        </table>
    </div>

    <div class='form-edit form-edit-chucnang'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI CHỨC NĂNG</h2>
        <div class="mb-3">
            <label for="form-edit-machucnang-input" class="form-label">Mã chức năng</label>
            <input type="text" class="form-control" id="form-edit-machucnang-input" disabled>
        </div>
        <div class="mb-3">
            <label for="form-edit-tenchucnang-input" class="form-label">Tên chức năng</label>
            <input type="text" class="form-control" id="form-edit-tenchucnang-input">
        </div>
        <button class="btn btn-primary submitEditChucnang">THAY ĐỔI</button>
    </div>
</div>
<script>
    validate();
    quanlyChucNang();
</script>