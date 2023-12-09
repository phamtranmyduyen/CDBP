<div class="option-hienthi-bangchamdiem">
    <button type="button" class="congdoan btn btn-primary btn-lg">Hiển thị theo CDBP</button>
    <button type="button" class="ngay btn btn-secondary btn-lg">Hiển thị theo ngày</button>
</div>
<div class="bangchamdiem-congdoan">
    <div class="bangdiemcongdoan-BCH row row-cols-md-3" id="load-data-bangdiemcongdoan">

    </div>
    <div id="danhsach-bangchamdiem-theocongdoan" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner danhsach-bangchamdiem-theocongdoan-inner">
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#danhsach-bangchamdiem-theocongdoan" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#danhsach-bangchamdiem-theocongdoan" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="option-action">
            <button class="btn btn-secondary btn-sm danhsach-bangchamdiem-theocongdoan-back">Trở về</button>
        </div>
    </div>
    <div id="table-danhsach-bangchamdiem-theocongdoan">
        <div id="inner-table-danhsach-bangchamdiem-theocongdoan">

        </div>
        <div class="option-action">
            <button class="btn btn-secondary btn-sm table-danhsach-bangchamdiem-theocongdoan-back">Trở về</button>
        </div>
    </div>
    <div id="inner-detail-table-danhsach-bangchamdiem-theocongdoan">
    <div class="title-detail-table-danhsach-bangchamdiem-theocongdoan">

</div>
        <table class="table-striped table table-hover">
            
            <tr class="table-main-CDBP">
                <th>STT</th>
                <th>Nội dung</th>
                <th>Điểm chuẩn</th>
                <th>Điểm tự chấm</th>
                <th>Ban chấp hành chấm</th>
            </tr>
            <tbody class="table-hover load-data load-data-detail-table-danhsach-bangchamdiem-theocongdoan" id="load-data-detail-table-danhsach-bangchamdiem-theocongdoan">

            </tbody>
        </table>
        <div class="option-action">
            <button class="btn btn-secondary btn-sm detail-table-danhsach-bangchamdiem-theocongdoan-back">Trở về</button>
            <button class="btn btn-primary btn-sm detail-table-danhsach-bangchamdiem-theocongdoan-save">Lưu</button>
        </div>
    </div>
</div>
<div class="bangchamdiem-ngay">
    <div class="bangdiemngay-BCH">
        <div class="bangdiem-tungay">
            <label for="input-bangdiem-tungay">Từ ngày</label>
            <input type="date" class="form-control" id="input-bangdiem-tungay">
        </div>
        <div class="bangdiem-denngay">
            <label for="input-bangdiem-denngay">Đến ngày</label>
            <input type="date" class="form-control" id="input-bangdiem-denngay">
        </div>
        <button type="button" class="btn btn-primary" id="loc-bangdiemngay">Lọc</button>
    </div>
    <div class="bangdiemcongdoan-BCH row row-cols-md-3" id="load-data-bangchamdiem-theongay">

    </div>
    <!-- <div id="table-danhsach-bangchamdiem-theongay">
        
        <div id="inner-table-danhsach-bangchamdiem-theongay">

        </div>
        <div class="option-action">
            <button class="btn btn-secondary btn-sm table-danhsach-bangchamdiem-theongay-back">Trở về</button>
        </div>
    </div> -->
    <div id="inner-detail-table-danhsach-bangchamdiem-theongay">
        <table class="table-striped table table-hover">
            <tr>
                <th>STT</th>
                <th>Nội dung</th>
                <th>Điểm chuẩn</th>
                <th>Điểm tự chấm</th>
                <th>Ban chấp hành chấm</th>
            </tr>
            <tbody class="table-hover load-data load-data-detail-table-danhsach-bangchamdiem-theongay" id="load-data-detail-table-danhsach-bangchamdiem-theocongdoan">

            </tbody>
        </table>
        <div class="option-action">
            <button class="btn btn-secondary btn-sm detail-table-danhsach-bangchamdiem-theongay-back">Trở về</button>
            <button class="btn btn-primary btn-sm detail-table-danhsach-bangchamdiem-theongay-save">Lưu</button>
        </div>
    </div>
</div>
<script>
    bangchamdiemcongdoan();
    onclickBangchamdiemcongdoan()
    bangchamdiemngay();
</script>