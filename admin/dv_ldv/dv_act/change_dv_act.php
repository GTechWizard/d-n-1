<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active"> Sửa dịch vụ đang hoạt động</li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row">
    <!-- form -->
    <form class="form" method="post" action="?act=update_dv_user">
      <?php
      if ($dvIdUser) {
        while ($result = $dvIdUser->fetch_assoc()) {
          ?>
          <div class="form-group  col-md-6">
            <label>Trạng Thái</label>
            <p>Trạng thái trước đó:"
              <?php
              switch ($result['trang_thai']) {
                case 0:
                  echo "Đang chờ xác nhận";
                  break;
                case 1:
                  echo "Chưa bắt đầu";
                  break;
                case 2:
                  echo "Đang trong tour";
                  break;
                case 3:
                  echo "Hoàn thành tour";
                  break;
                default:
              }
              ?>"
            </p>
            <select class="form-control" name="trang_thai">
              <option value="0">Đang chờ xác nhận</option>
              <option value="1">Chưa bắt đầu</option>
              <option value="2">Đang trong tour</option>
              <option value="3">Hoàn thành tour</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="day">Lượng Người</label>
            <p>Số lượng người trong chuyến đi đã được đăng ký</p>
            <input type="number" value="<?=$result['ng_dk']?>" name="ng_dk" id="day" class="form-control">
            <input type="hidden" value="<?=$result['id_pk_user']?>" name="id_pk_user">
          </div>
          <div class="control-form col-md-12">
            <input type="submit" value="Lưu" class="btn btn-success" name="save">
            <a href="?act=ct_dv_act&id=<?=$result['id_dv']?>">Cancel</a>
          </div>
        <?php }
      } ?>
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