<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Sửa dịch vụ</li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row">
    <!-- form -->
    <form action="?act=update_dv" class="form" method="post" enctype="multipart/form-data">
      <?php
      if ($dvID) {
        while ($result = $dvID->fetch_assoc()) {
          ?>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên Dịch Vụ</label>
              <input type="text" class="form-control" value="<?= $result['name'] ?>" name="name" />
              <input type="hidden" value="<?= $result['id_dv'] ?>" name="id_dv" />
            </div>
            <div class="form-group">
              <label>Nơi Bắt Đầu</label>
              <input type="text" class="form-control" value="<?= $result['noi_bd'] ?>" name="noi_bd" />
            </div>
            <div class="form-group">
              <label>Điểm đến</label>
              <input type="text" class="form-control" value="<?= $result['diem_den'] ?>" name="diem_den" />
            </div>
            <div class="form-group">
              <label>Giá Người Lớn</label>
              <input type="number" class="form-control" value="<?=$result['price_old']?>" name="price_old" />
            </div>
            <div class="form-group">
              <label>Giá Trẻ Em</label>
              <input type="number" class="form-control" value="<?=$result['price_young']?>" name="price_young" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Ngày bắt đầu</label>
              <input type="text" class="form-control" value="<?= $result['day_start'] ?>" name="day_start" />
            </div>
            <div class="form-group">
              <label>Ngày kết thúc</label>
              <input type="text" class="form-control" value="<?= $result['day_end'] ?>" name="day_end" />
            </div>
            <div class="form-group">
              <label>Loại Dịch Vụ</label>
              <select class="form-control" name="id_pk_loai">
                <?php
                foreach ($dsl as $loai) {
                  extract($loai);
                  if ($result['id_pk_loai'] == $id_loai) {
                    echo "<option value=" . $id_loai . " seleted>" . $kieu_dv . "</option>";
                  } else {
                    echo "<option value=" . $id_loai . ">" . $kieu_dv . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tổng người</label>
              <input type="number" class="form-control" value="<?= $result['tong_ng'] ?>" name="tong_ng" />
            </div>
            <div class="form-group">
              <label>Ảnh</label>
              <label><img src="<?= $result['img_dv'] ?>" alt="img" width="20%" title="Ảnh trước đó"></label>
              <input type="file" name="img_dv" />
            </div>

          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label> Bài Viết </label>
              <textarea id="mytextarea" name="bv" style="width: 70vw"><?= $result['bai_viet'] ?></textarea>
            </div>
          </div>
          <div class="control-form col-md-12">
            <input type="submit" value="Lưu" class="btn btn-success" name="save" />
            <a href="?act=dv">Cancel</a>
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