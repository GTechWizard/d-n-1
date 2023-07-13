<?php
require_once('../model/model_user.php');
?>
<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Thay đổi thông tin người dùng</li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row center-block">
    <form action="?act=update_user" class="form" method="post">
      <?php
      if ($userID) {
        while ($result = $userID->fetch_assoc()) {
          ?>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Tên Người Dùng</label>
              <input type="text" class="form-control" value="<?= $result['name'] ?>" name="name">
            </div>
            <div class="form-group">
              <label for="">Số Điện Thoại </label>
              <input type="number" value="<?= $result['sdt'] ?>" class="form-control" name="sdt">
            </div>
            <div class="form-group selectcontrol">
              <label>Vai Trò</label>
              <select class="form-control" name="vai_tro">
                <?php
                if ($result['vai_tro'] == 1) {
                  echo '<option selected value="1">Quản trị viên</option>';
                } else {
                  echo '<option  value="0">Khách Hàng</option>';
                }
                if ($result['vai_tro'] == 0) {
                  echo '<option value="1">Quản trị viên</option>';
                } else {
                  echo '<option selected value="0">Khách Hàng</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Địa Chỉ </label>
              <input type="text" value="<?= $result['dia_chi'] ?>" class="form-control" name="dia_chi">
              <input type="hidden"value="<?= $result['id_user'] ?>" name="id">
            </div>
            <div class="form-group">
              <label for="">Email </label>
              <input type="email" value="<?= $result['email'] ?>" class="form-control" name="email">
            </div>
          </div>
          <div class="control-from col-md-12">
            <input type="submit" name="save" value="Lưu" class="btn btn-md btn-success">
            <a href="?act=user">Cancel</a>
          </div>
        </form>
      <?php }
      } ?>
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