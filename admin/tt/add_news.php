<!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active">Thêm tin mới</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <form method="post" class="form" action="?act=add_news" enctype="multipart/form-data">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Tên tác giả</label>
            <input type="text" class="form-control" placeholder="name..." id="name" name="tac_gia"required/>
          </div>
          <div class="form-group">
            <label for="day">Ngày đăng bài</label>
            <input type="date" name="ngay_d" id="day" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="tuabv">Tựa bài viết </label>
            <input type="text" name="name" class="form-control" id="tuabv" placeholder="tên bài viết..." maxlength="60" required>
          </div>
          <div class="form-group">
            <label for="place">Địa điểm (bài viết về nơi nào) </label>
            <input type="text" name="dia_diem" class="form-control" id="place" placeholder="tên địa điểm..." required>
            <label>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Bài Viết </label>
            <textarea id="mytextarea" name="bai_viet"></textarea>
          </div>
          <div class="form-group">
            <label>Mô tả ngắn (200 từ) </label>
            <textarea name="mo_ta" class="form-control" rows="5" maxlength="200" required></textarea>
          </div>
        </div>
        <input type="file" name="img" required>
        <div class="control-from col-md-12">
          <input type="submit" value="Lưu" class="btn btn-sm btn-success" name="save">
          <input type="reset" value="Làm Lại" class="btn btn-sm btn-primary">
        </div>

      </form>
    </div>
  </div>
  <!--/.main-->

  <script src="../js/jquery-1.11.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/chart.min.js"></script>
  <script src="../js/chart-data.js"></script>
  <script src="../js/easypiechart.js"></script>
  <script src="../js/easypiechart-data.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/custom.js"></script>
</body>

</html>