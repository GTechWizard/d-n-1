<!-- trang chính -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home"></em>
            </a>
          </li>
          <li class="active">Thêm giá dịch vụ</li>
        </ol>
      </div>
      <!--/.row-->
      <div class="row">
        <!-- form -->
        <form action="?act=price_new" class="form" method="post">
          <div class="col-md-6">
          <div class="form-group">
              <label>Dịch Vụ</label>
              <select class="form-control" name="id_dv"required>
              <?php
                foreach ($dsdv as $dv) {
                  extract($dv);
                    echo "<option value=" . $id_dv . ">ID: ".$id_dv." - Tên DV: ". $name ."</option>";
                }
                ?>
               </select>
            </div>
            <div class="form-group">
              <label>Giá Người Lớn</label>
              <input type="number" class="form-control"name="price_old" placeholder="1.200.000 VNĐ"required/>
            </div>
            <div class="form-group">
              <label>Giá Trẻ Em</label>
              <input type="number" class="form-control" name="price_young" placeholder="500.000 VNĐ"required/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Ngày bắt đầu</label>
              <input type="date" class="form-control" name="day_start" placeholder="12/12/2022"required/>
            </div>
            <div class="form-group">
              <label>Ngày kết thúc</label>
              <input type="date" class="form-control"name="day_end" placeholder="01/01/2023"required/>
            </div>
          </div>
          <div class="control-form col-md-12">
            <input type="submit" value="Lưu" class="btn btn-success" name="save"/>
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
