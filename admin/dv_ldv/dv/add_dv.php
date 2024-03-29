<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Thêm dịch vụ</li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row">
    <!-- form -->
    <form action="?act=dv_new" class="form" method="post" enctype="multipart/form-data">
      <div class="col-md-6">
        <div class="form-group">
          <label>Tên Dịch Vụ</label>
          <input type="text" class="form-control" name="name" placeholder="Chuyến Du Lịch Kỳ Thú,..." required />
        </div>
        <div class="form-group">
          <label>Nơi Bắt Đầu</label>
          <input type="text" class="form-control" name="noi_bd" placeholder="Hồ Chí Minh,.." required />
        </div>
        <div class="form-group">
          <label>Điểm đến</label>
          <input type="text" class="form-control" name="diem_den" placeholder="Đảo Cát Bà,.." required />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Loại Dịch Vụ</label>
          <select class="form-control" name="id_pk_loai" required>
            <?php
            foreach ($dsl as $loai) {
              extract($loai);
              echo "<option value=" . $id_loai . ">" . $kieu_dv . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Tổng người</label>
          <input type="number" class="form-control" name="tong_ng" required placeholder="10-100" />
        </div>
        <div class="form-group">
          <label>Ảnh</label>
          <input type="file" name="img_dv" required />
        </div>
      </div>
  <div class="col-md-12">
    <div class="form-group">
      <label> Bài Viết </label>
      <textarea id="mytextarea" name="bv" style="width: 70vw"></textarea>
    </div>
  </div>
  <div class="control-form col-md-12">
    <input type="submit" value="Lưu" class="btn btn-success" name="save" />
    <input type="reset" value="Làm lại" class="btn btn-danger" />
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