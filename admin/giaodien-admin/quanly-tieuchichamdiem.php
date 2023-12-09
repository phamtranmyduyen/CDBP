<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-tieuchichamdiem">
    <div class="panner-img">
        <img src="../img/quanly-tieuchichamdiem.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top tieuchichamdiem-top">
        <form onsubmit="return false" class="needs-validation form-add form-add-tieuchichamdiem" novalidate>
            <h3>THÊM TIÊU CHÍ CHẤM ĐIỂM</h3>
            <div class="row mb-3">
                <label for="input-add-noidungtieuchi" class="col-sm-4 col-form-label">Nội dung tiêu chí</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="input-add-noidungtieuchi" required></textarea>
                    <div class="error" id="error-addnoidungtieuchi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-diemchuantieuchi" class="col-sm-4 col-form-label">Điểm chuẩn tiêu chí</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-diemchuantieuchi" required>
                    <div class="error" id="error-adddiemchuantieuchi">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary submit-add submit-add-tieuchichamdiem">THÊM</button>
    </div>
    <div class="form-find form-find-tieuchichamdiem">
        <span id="noti-find-tieuchichamdiem"></span>
        <h3>TÌM KIẾM TIÊU CHÍ CHẤM ĐIỂM</h3>
        <div class="row mb-3">
            <label for="input-findMatieuchi" class="col-sm-4 col-form-label">Mã tiêu chí</label>
            <div class="col-sm-8">
                <input class="form-control" id="input-findMatieuchi" type="text" />
            </div>
        </div>
        <div class="row mb-3">
            <label for="input-findNoidungtieuchi" class="col-sm-4 col-form-label">Nội dung tiêu chí</label>
            <div class="col-sm-8">
                <input class="form-control" id="input-findNoidungtieuchi" type="text" />
            </div>
        </div>
    </div>
</div>
<div class='data-quanly tieuchichamdiem'>
    <table class='table-striped table table-hover table-data-quanly table-tieuchichamdiem'>
        <th>Mã tiêu chí</th>
        <th>Nội dung tiêu chí</th>
        <th>Điểm chuẩn</th>
        <th>Sửa</th>
        <th>Xóa</th>
        <tbody class="load-data table-hover" id="load_data_tieuchichamdiem">

        </tbody>

    </table>
</div>

<div class='form-edit form-edit-tieuchichamdiem'>
    <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
    <h2>THAY ĐỔI TIÊU CHÍ CHẤM ĐIỂM</h2>
    <div class="mb-3">
        <label for="form-edit-matieuchi-input">Mã tiêu chí</label>
        <input type="text" class="form-control" id="form-edit-matieuchi-input" required disabled>
        <div class="error" id="error-editmatieuchi">
            <!-- Looks good! -->
        </div>
    </div>
    <div class="mb-3">
        <label for="form-edit-noidungtieuchi-input">Nội dung tiêu chí</label>
        <textarea class="form-control" id="form-edit-noidungtieuchi-input" required></textarea>
        <div class="error" id="error-editnoidungtieuchi">
            <!-- Looks good! -->
        </div>
    </div>
    <div class="mb-3">
        <label for="form-edit-diemchuan-input">Điểm chuẩn</label>
        <input type="number" class="form-control" id="form-edit-diemchuan-input" required>
        <div class="error" id="error-editdiemchuantieuchi">
            <!-- Looks good! -->
        </div>
    </div>

    <button class="btn btn-primary submitEdit submitEditTieuchichamdiem">THAY ĐỔI</button>
</div>
</div>
<script>
    validate();
    quanlyTieuchichamdiem();
</script>