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
            <th class="th-inner">Trẻ Em</th>
            <th class="th-inner">Người Lớn</th>
            <th class="th-inner">Người Dùng</th>
            <th class="th-inner">SĐT</th>
            <th class="th-inner">Email</th>
            <th class="th-inner">Ngày ĐK</th>
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
            <td class="th-inner"><?=$result['so_luong_old']+$result['so_luong_young']?></td>
            <td class="th-inner"><?=$result['so_luong_young']?></td>
            <td class="th-inner"><?=$result['so_luong_old']?></td>
            <td class="th-inner"><?=$result['user_name']?></td>
            <td class="th-inner"><?=$result['user_sdt']?></td>
            <td class="th-inner"><?=$result['user_email']?></td>
            <td class="th-inner"><?=$result['ngay_dkdv']?></td>
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