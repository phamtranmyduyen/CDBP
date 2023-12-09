
<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-quyen">
    <div class="panner-img">
        <img src="../img/quanly-quyen.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top quyen-top">
        <form onsubmit="return false" class="needs-validation form-add form-add form-add-quyen" novalidate>
            <h3>THÊM QUYỀN</h3>
            <div class="row mb-3">
                <label for="input-add-maquyen" class="col-sm-4 col-form-label">Mã quyền</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-maquyen" required>
                    <div class="error" id="error-addmaquyen">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-tenquyen" class="col-sm-4 col-form-label">Tên quyền</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-tenquyen" required>
                    <div class="error" id="error-addtenquyen">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary submit-add submit-add-quyen" type="submit">THÊM</button>
        </form>

        <div class="form-find form-find-quyen">
            <span id="noti-find-quyen"></span>
            <h3>TÌM KIẾM QUYỀN</h3>
            <div class="row mb-3">
                <label for="input-findMaquyen" class="col-sm-4 col-form-label">Mã quyền</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findMaquyen" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findTenquyen" class="col-sm-4 col-form-label">Tên quyền</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findTenquyen" type="text" />
                </div>
            </div>
        </div>
    </div>
    <div class='data-quanly quyen'>
        <table class='table-striped table table-hover table-data-quanly table-quyen'>
            <th>Mã quyền</th>
            <th>Tên quyền</th>
            <th>Chọn chức năng</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load_data table-hover" id="load_data_quyen">

            </tbody>

        </table>
    </div>

    <div class='form-edit-quyen form-edit'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI QUYỀN</h2>
        <div class="mb-3">
            <label for="form-edit-maquyen-input">Mã quyền</label>
            <input type="text" class="form-control" id="form-edit-maquyen-input" required disabled>
            <div class="error" id="error-editmaquyen">
                <!-- Looks good! -->
            </div>
        </div>
        <div class="mb-3">
            <label for="form-edit-tenquyen-input">Tên quyền</label>
            <input type="text" class="form-control" id="form-edit-tenquyen-input" required>
            <div class="error" id="error-edittenquyen">
                <!-- Looks good! -->
            </div>
        </div>

        <button class="btn btn-primary submitEdit submitEditQuyen">THAY ĐỔI</button>
    </div>
    <div class='form-add-chucnang-quyen'>
        <button onclick="closeAddQuyenChucnang()" class="edit-close"><i class="far fa-window-close text-light"></i></button>

        <h2>THÊM CHỨC NĂNG</h2>
        <div id="list_chucnang">

        </div>
        <button class="btn btn-primary submitAddChucnang">CHỌN</button>
    </div>
</div>
<script>
     validate();
    quanlyQuyen();
</script>