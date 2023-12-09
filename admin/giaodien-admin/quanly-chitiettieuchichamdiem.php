<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-chitiettieuchichamdiem">
    <div class="panner-img">
        <img src="../img/quanly-chitiettieuchichamdiem.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top chitiettieuchichamdiem-top">
        <form onsubmit="return false" class="needs-validation form-add form-add-chitiettieuchichamdiem" novalidate>
            <h3>THÊM CHI TIẾT TIÊU CHÍ CHẤM ĐIỂM</h3>
            <div class="row mb-3">
                <label for="input-add-noidungchitiettieuchi" class="col-sm-5 col-form-label">Nội dung chi tiết tiêu chí</label>
                <div class="col-sm-7">
                    <textarea type="text" class="form-control" id="input-add-noidungchitiettieuchi" required></textarea>
                    <div class="error" id="error-addnoidungchitiettieuchi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-diemchuanchitiettieuchi" class="col-sm-5 col-form-label">Điểm chuẩn chi tiết tiêu chí</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="input-add-diemchuanchitiettieuchi" required>
                    <div class="error" id="error-adddiemchuanchitiettieuchi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-matieuchi" class="col-sm-5 col-form-label">Thuộc tiêu chí</label>
                <div class="col-sm-7">
                    <select id="list-tieuchi" class='form-select list-tieuchi' required>

                    </select>
                    <div class="error" id="error-addmatieuchi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary submit-add submit-add-chitiettieuchichamdiem">THÊM</button>
        </form>
        <div class="form-find form-find-chitiettieuchichamdiem">
            <h3>TÌM KIẾM CHI TIẾT TIÊU CHÍ CHẤM ĐIỂM</h3>
            <div class="row mb-3">
                <label for="input-findMachitiettieuchi" class="col-sm-4 col-form-label">Mã chi tiết tiêu chí</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findMachitiettieuchi" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findNoidungchitiettieuchi" class="col-sm-5 col-form-label">Nội dung chi tiết tiêu chí</label>
                <div class="col-sm-7">
                    <input class="form-control" id="input-findNoidungchitiettieuchi" type="text" />
                </div>
            </div>
        </div>
    </div>
    <div class='data-quanly chitiettieuchichamdiem'>
        <table class='table-striped table table-hover table-data-quanly table-chitiettieuchichamdiem'>
            <th>Mã chi tiết tiêu chí</th>
            <th>Nội dung chi tiết tiêu chí</th>
            <th>Điểm chuẩn</th>
            <th>Thuộc tiêu chí</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load-data table-hover" id="load_data_chitiettieuchichamdiem">

            </tbody>

        </table>
    </div>

    <div class='form-edit form-edit-chitiettieuchichamdiem'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI CHI TIẾT TIÊU CHÍ CHẤM ĐIỂM</h2>
        <div class="mb-3">
            <label for="form-edit-machitiettieuchi-input" class="form-label">Mã chi tiết tiêu chí</label>
            <input type="text" class="form-control" id="form-edit-machitiettieuchi-input" disabled>
        </div>
        <div class="mb-3">
            <label for="form-edit-noidungchitiettieuchi-input" class="form-label">Nội dung</label>
            <textarea class="form-control" id="form-edit-noidungchitiettieuchi-input"></textarea>
        </div>
        <div class="mb-3">
            <label for="form-edit-diemchuanchitiettieuchi-input" class="form-label">Điểm chuẩn</label>
            <input type="number" class="form-control" id="form-edit-diemchuanchitiettieuchi-input" />
        </div>
        <button class="btn btn-primary submitEditChitiettieuchichamdiem">THAY ĐỔI</button>
    </div>
</div>
<script>
    validate();
    quanlyChitiettieuchichamdiem();
</script>