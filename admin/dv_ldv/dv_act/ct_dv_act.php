 <!-- trang chính -->
 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li>
        <li class="active">Chi tiết dịch vụ đang hiện hành</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <div class="fixed-table-container">
        <table class="table fixed-table-container ">
          <thead class="fixed-table-header th-inner">
            <th class="th-inner">STT</th>
            <th class="th-inner">Lượng Người Đăng ký</th>
            <th class="th-inner">Loại Người</th>
            <th class="th-inner">ID Người Dùng</th>
            <th class="th-inner">Tên </th>
            <th class="th-inner">SĐT</th>
            <th class="th-inner">Địa chỉ</th>
            <th class="th-inner">Email</th>
            <th class="th-inner">Ngày ĐK</th>
            <th class="th-inner">Vai Trò</th>
            <th></th>
          </thead>
          <?php 
						$i=0;
            if($list){
              while($result=$list->fetch_assoc()){
                $i++;
          ?>
          <tbody class="fixed-table-body">
            <td class="th-inner"><?=$i?></td>
            <td class="th-inner"><?=$result['so_luong']?></td>
            <td class="th-inner"><?=$result['type_ng']?></td>
            <td class="th-inner"><?=$result['id_user']?></td>
            <td class="th-inner"><?=$result['name']?></td>
            <td class="th-inner"><?=$result['sdt']?></td>
            <td class="th-inner"><?=$result['dia_chi']?></td>
            <td class="th-inner"><?=$result['email']?></td>
            <td class="th-inner"><?=$result['ngay_dkdv']?></td>
            <td class="th-inner"><?php 
            switch ($result['vai_tro']) {
              case 0:
                echo "Khách Hàng";
                break;
              case 1:
                echo "Quản Lý";
                break;
            }
            ?></td>
          <tbody>
          <?php }}?>
        </table>
      </div>
      <a href="?act=dv_act" class="btn">Trở lại</a>
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