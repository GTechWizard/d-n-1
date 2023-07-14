<!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active"> Sửa loại dịch vụ</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <form action="?act=update_loai" class="form" method="post" enctype="multipart/form-data">
      <?php
      if ($loaiID) {
        while ($result = $loaiID->fetch_assoc()) {
          ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Kiểu Dịch Vụ</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="kieu_dv" value="<?= $result['kieu_dv'] ?>">
          <input type="hidden" name="id_loai" value="<?= $result['id_loai'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Ảnh</label>
          <label><img src="<?= $result['img'] ?>" alt="img" width="20%" title="Ảnh trước đó"></label>
          <input type="file" id="exampleInputFile" name="img">
        </div>
        <div class="control-form">
        <input type="submit" value="Lưu" class="btn btn-success" name="save">
        <a href="?act=loai">Cancel</a>
      </div>
      <?php }}?>
      </form>
    </div>
  </div>
  <!--/.main-->

  <script src="../../js/jquery-1.11.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/chart.min.js"></script>
  <script src="../../js/chart-data.js"></script>
  <script src="../../js/easypiechart.js"></script>
  <script src="../../js/easypiechart-data.js"></script>
  <script src="../../js/bootstrap-datepicker.js"></script>
  <script src="../../js/custom.js"></script>
</body>

</html>