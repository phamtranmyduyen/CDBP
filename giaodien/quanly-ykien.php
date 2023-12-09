<div class="bangchamdiem-moinhat">
    <div class="filter-bangchamdiem-moinhat">
        <select id="filter-index-TVBCH" class="form-select">
            <option value="filter">Bộ lọc</option>
            <option value="Đã xử lý">Trạng thái: Xử lý</option>
            <option value="Chưa xử lý">Trạng thái: Chưa xử lý</option>
        </select>
    </div>
    <div class="content-BCH row row-cols-md-4" id="load-data-quanlyykien">

    </div>
    <div class="table-action-point-CDBP">
        <div class="title-action-y-kien">

        </div>
        <table class="table-hover table-striped table">
            <tr>
                <th>STT</th>
                <th>Nội dung</th>
                <th>Điểm chuẩn</th>
                <th>Điểm CĐBP chấm</th>
                <th>Điểm BCH chấm</th>
            </tr>
            <tbody class="table-hover load-data load-data-action-point-CDBP" id="load-data-action-point-CDBP">
                <!-- <th>Điểm BCH công đoàn chấm</th> -->
            </tbody>
        </table>
        <div class="option-action">
            <button class="btn btn-secondary btn-sm back-ykien">Trở về</button>
            <button class="btn btn-primary btn-sm save-point-BCH-ykien">Lưu</button>
        </div>
    </div>
</div>
<script>
  xulyIndexQuanLyYKien();
</script>