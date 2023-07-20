<!-- trang chính -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <em class="fa fa-home"></em>
          </a>
        </li> 
        <li class="active">Danh sách dịch vụ</li>
      </ol>
    </div>
    <!--/.row-->
    <div class="row">
      <div class="fixed-table-container">
        <table class="table fixed-table-container ">
          <thead class="fixed-table-header th-inner">
            <th class="th-inner">STT</th>
            <th class="th-inner">ID DV</th>
            <th class="th-inner">Loại DV</th>
            <th class="th-inner">Nơi Bắt Đầu</th>
            <th class="th-inner">Điểm đến</th>
            <th class="th-inner">Ngày Đi</th>
            <th class="th-inner">Ngày Về</th>
            <th class="th-inner">Giá Trẻ Em</th>
            <th class="th-inner">Giá Người Lớn</th>
            <th class="th-inner">Lượt Xem</th>
            <th class="th-inner">Tổng Người</th>
            <th class="th-inner">Bài Viết</th>
          </thead>
          <?php 
            if($DVList){
              while($result=$DVList->fetch_assoc()){
                $i++;
          ?>
          <tbody class="fixed-table-body">
            <td class="th-inner"><?=$i?></td>
            <td class="th-inner"><?=$result['id_dv']?></td>
            <td class="th-inner"><?=$result['name']?></td>
            <td class="th-inner"><?=$result['noi_bd']?></td>
            <td class="th-inner"><?=$result['diem_den']?></td>
            <td class="th-inner"><?=$result['day_start']?></td>
            <td class="th-inner"><?=$result['day_end']?></td>
            <td class="th-inner"><?=$result['price_young']?></td>
            <td class="th-inner"><?=$result['price_old']?></td>
            <td class="th-inner"><?=$result['luot_xem']?></td>
            <td class="th-inner"><?=$result['tong_ng']?></td>
            <td class="th-inner"><a href="?act=ctbv_dv&id=<?=$result['id_dv']?>">Chi tiết</a></td>
          <tbody>
            <td colspan="11"><a href="?act=edit_dv&id=<?=$result['id_dv']?>">Sửa</a> <a href="?act=delete_dv&id=<?=$result['id_dv']?>">Xóa</a></td>
          </tbody>
          </tbody>
          <?php }}?>
        </table>
      </div>
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