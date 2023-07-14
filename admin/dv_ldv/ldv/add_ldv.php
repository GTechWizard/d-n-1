<!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active"> Thêm loại dịch vụ</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <form  action="?act=loai_new" class="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Kiểu Dịch Vụ</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Trong nước,..." name="kieu_dv" required>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Ảnh</label>
          <input type="file" id="exampleInputFile" name="img" required>
        </div>
        <div class="control-form">
        <input type="submit" value="Lưu" class="btn btn-success" name="save">
        <input type="reset" value="Làm lại" class="btn btn-danger">
      </div>
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