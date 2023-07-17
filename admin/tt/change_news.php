<!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active">Thay đổi tin tức</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <form method="post" class="form" action="?act=update_tt" enctype="multipart/form-data">
      <?php
      if ($ttID) {
        while ($result = $ttID->fetch_assoc()) {
          ?>
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Tên tác giả</label>
            <input type="text" class="form-control" value="<?=$result['tac_gia']?>" name="tac_gia" id="name" />
            <input type="hidden" value="<?=$result['id_tt']?>" name="id_tt"/>
          </div>
          <div class="form-group">
            <label for="day">Ngày đăng bài</label>
            <input type="date" value="<?=$result['ngay_d']?>" name="ngay_d" id="day" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="tuabv">Tựa bài viết </label>
            <input type="text" value="<?=$result['name']?>" name="name" class="form-control" id="tuabv">
          </div>
          <div class="form-group">
            <label for="place">Địa điểm (bài viết về nơi nào) </label>
            <input type="text" value="<?=$result['dia_diem']?>" name="dia_diem" class="form-control" id="place">
            <label>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Bài viết</label>
            <textarea id="mytextarea" name="bai_viet"><?=$result['bai_viet']?></textarea>
          </div>
          <div class="form-group">
            <label>Mô tả ngắn (200 từ) </label>
            <textarea name="mo_ta" class="form-control" rows="5"><?=$result['mo_ta']?></textarea>
          </div>
        </div>
          <div class="col-md-12">
        <img src="<?=$result['img_tt']?>" alt="ảnh trước" width="20%" title="ảnh trước">
        <input type="file" name="img">
      </div>
        <div class="control-from col-md-12">
          <input type="submit" value="Lưu" class="btn btn-sm btn-success" name="save">
          <a href="?act=tt" class="btn btn-sm btn-primary">Cancel</a>
        </div>
          <?php }}?>
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